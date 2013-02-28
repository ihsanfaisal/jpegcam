<?php

   /**
     * Handling HTTP RAW DATA sent from jpegcam
     *
     * @Route("/webcamupload", name="applicants_webcam_uploadhandler")
     * @Method("POST")
     */
    public function webcamUploadHandlerAction(Request $request) {
        $filename = "uploads/webcam-photos/" . date('YmdHis') . '.jpg';
        
        $output = $filename;
        
        $result = file_put_contents($filename, file_get_contents('php://input'));
        if (!$result) {
            $output = "ERROR: Failed to write data to $filename, check permissions\n";
        }

        return new Response($output, 200,
                array(
                    'Content-Type' => 'text/plain'
                ));
    }


