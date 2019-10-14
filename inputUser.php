<?php


    function emptyString($topic) {
        if (isset($_POST["submit"])){
            if (empty($_POST[$topic])) {
                if($topic == "textArea") {
                    echo "<p class='text-center'>this field is required</p>";
                }
                else {
                    echo "<p class='offset-md-3 col-md-6 error'>this field is required</p>";
                }      
            }
        }
    }

    function regExString($topic) {
        if(isset($_POST["submit"])) {
             $respect;

             if($topic == "email") {
                 $respect = preg_match( "/([a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+).[a-zA-Z_-]{2,4}$/", $_POST[$topic]);
             }

             else {
               $respect = preg_match("/^[a-zA-Z ,.'-]+$/i", $_POST[$topic]);
             }

             if($respect == 0 AND !empty($_POST[$topic])) {
                if ($topic == "textArea"     ) {
                    echo "<p class='text-center error'>Invalid format</p>";
                    $_POST[$topic] = '';
                }
                else {
                    echo "<p class='offset-md-3 col-md-6 error'>Invalid format</p>";
                    $_POST[$topic] = '';
                }
            }
        }
    }

    function allGood() {
        if(!empty($_POST['name']) AND !empty($_POST['firstName']) AND !empty($_POST['gender']) AND !empty($_POST['country']) AND !empty($_POST['email']) AND !empty($_POST['textArea']) AND isset($_POST['submit'])) {
            $to      = $_POST['email'];
            $subject = "We received your message";
            $message = 'We received your message \n'.$_POST['textArea']."We'll try to respond as soon as possible.";
            mail($to, $subject, $message);
        }
    }
    

        


   
    
    
    


?>