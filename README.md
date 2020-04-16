# MyLeave
Web Application for Leave Management System.
- Enter Your Email, Password and Name in **register_user.php** and **php/mail_function.php** for sending Email.
- Enter IP ADDRESS, DATABASE USERNAME, DATABASE PASSWORD and DATABASE NAME in **php/config.php**.
    - If you are using XAMPP Server(by default)
        - IP ADDRESS : 127.0.0.1
        - DATABASE USERNAME : root
        - DATABASE PASSWORD : null
        - DATABASE NAME : Your Database Name
- Enter Encryption/Decryption Method, Key and IV in **register_user.php** and **php/verification.php** respectively.
- For Database
    - Create 4 Tables
        1. admin

            ![admin table](/images/admin_1.PNG)
            ![admin index](/images/admin_2.PNG)
        2. employee

            ![employee table](/images/employee_1.PNG)
            ![employee index](/images/employee_2.PNG)
        3. request_late_entry

            ![request_late_entry table](/images/request_late_entry_1.PNG)
            ![request_late_entry index](/images/request_late_entry_2.PNG)
        4. request_leave

            ![request_leave table](/images/request_leave_1.PNG)
            ![request_leave index](/images/request_leave_2.PNG)