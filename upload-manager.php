<?php

// 1)name
// 2)type
// 3)size




 // اول  شرط الي هو لو الفورم post 
if($_SERVER['REQUEST_METHOD'] == 'POST') {    //step1
    // الشرط التاني لو اسم الحقل موجود (photo)        و مفيش ايرورات    
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {     //step2
        // make an assosative array named allowed and write in it the allowed extentions
        $allowed = array("jpg" => "image/jpg", "png" => "image/png" , "gif" => "image/gif", "jpeg" => "image/jpeg", "pdf" => "application/pdf", "mp4" => "video/mp4");   //step3

        //اعمل متغير علشان تحصل ع الfilename
        $fileName = $_FILES["photo"]["name"];  //step4 1)name
        //اعمل متغير علشان تحصل ع الfiletype
        $fileType = $_FILES["photo"]["type"];  //step5 2)type
        //اعمل متغير علشان تحصل ع الfilesize
        $fileSize = $_FILES["photo"]["size"];  //step6 3)size

        //اسم الصورة و امتدادها
        $text = pathinfo($fileName, PATHINFO_EXTENTION);  //step7
        //لو اسم الصوره و امتدادها و الامتدادات المتاحه مش موجودين  وقف كل حاجه و طلعلوا رساله ايرور
        if(!array_key_exists($text, $allowed)) die("Error: Please select a valid file format.");  //step8
        

        //اتاكد هل فايل الtype و الallowed موجود؟
        if(in_array($fileType, $allowed)){     //step9
            //  شرط لو الفولدر و اسم الفايل موجودين
            if(file_exists("upload/" . $fileName)) {    //step10
                //اسم الفايل موجود بالفعل
                echo $fileName . "is already exists";   //step11
            }else{
                // now the file had uploaded in a place in the computer name "tmp name"
                // so I move it to my own place that I want
                // here first we write the photo and go to tmp name and then put the new place + filename
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/".$fileName);     //step12
                //done
                echo"Your file is uploaded successfully.";   //step13
            }
        } else {
            //else an error message
            echo"Error: There was a problem in uploading this file. Please try again";    //step14
        } 
    }else {
        //else get message by the real error syntax
        echo "Error:" . $_FILES["photo"]["error"];     //step15
    }

}

?>