8388608 bytes is 8M, the default limit in PHP. Update your post_max_size in php.ini to a larger value.

upload_max_filesize sets the max file size that a user can upload while post_max_size sets the maximum amount of data that can be sent via a POST in a form.

So you can set upload_max_filesize to 1 meg, which will mean that the biggest single file a user can upload is 1 megabyte, but they could upload 5 of them at once if the post_max_size was set to 5.



RESULT:
 id branch Year file uploaded_date 


 Assignment:

 id student_id class file submited_date


 Attendance:

 id student_id class file submited_date


Fees: 	Admin

id branch class semister fees

