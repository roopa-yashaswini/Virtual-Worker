<?php
    //Declaring variables.
    $host = "localhost";
    $user = "root";
    $password = '';
    $db = "bank";
    $table_credit_card_applications = "credit_card_applications";
    $table_account_open = "account_open_applications";
    $table_loan_applications = "personal_loan_applications";
    $table_employees = "employees";


    // Connecting to database.
    $con = mysqli_connect($host, $user, $password);


    // Check connection
    if(!$con) {
        die("<br>Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $db";

    if (!mysqli_query($con, $sql)) {
        echo "<br>Error creating database: " . mysqli_error($con);
    }

    // Connecting to database
    $sql = "USE $db";
    if (!mysqli_query($con, $sql)) {
        echo "<br>Error creating database: " . mysqli_error($con);
    }

    $sql = "CREATE TABLE IF NOT EXISTS $table_employees(
        id INT PRIMARY KEY AUTO_INCREMENT,
        employee_id VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        mobile CHAR(10) NOT NULL,
        district VARCHAR(255) NOT NULL,
        branch_name VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        UNIQUE(employee_id, district, branch_name),
        UNIQUE(email),
        UNIQUE(mobile)
    )";

      if(!mysqli_query($con, $sql)){
          echo "<br> Error creating table: " . mysqli_error($con);
      };


    $sql = "CREATE TABLE IF NOT EXISTS $table_credit_card_applications(
                application_no INT PRIMARY KEY AUTO_INCREMENT,
                customer_type VARCHAR(255) NOT NULL,
                customer_id VARCHAR(255),
                f_name VARCHAR(255) NOT NULL,
                m_name VARCHAR(255),
                l_name VARCHAR(255) NOT NULL,
                card_name VARCHAR(255) NOT NULL,
                gender VARCHAR(20) NOT NULL,
                dob DATE NOT NULL,
                nationality VARCHAR(255) NOT NULL,
                identification_no VARCHAR(255) NOT NULL UNIQUE,
                mobile_no CHAR(10) NOT NULL,
                alt_mobile_no CHAR(10),
                no_dependents INT NOT NULL,
                address VARCHAR(255) NOT NULL,
                pincode INT NOT NULL,
                district VARCHAR(255) NOT NULL,
                city VARCHAR(255) NOT NULL,
                state VARCHAR(255) NOT NULL,
                residence_type VARCHAR(255) NOT NULL,
                stay_period VARCHAR(4) NOT NULL,
                vehicle_type VARCHAR(255) NOT NULL,
                vehicle_purchase VARCHAR(4),
                company_name VARCHAR(255) NOT NULL,
                designation VARCHAR(255) NOT NULL,
                company_address VARCHAR(255) NOT NULL,
                company_pincode INT NOT NULL,
                company_city VARCHAR(255) NOT NULL,
                company_state VARCHAR(255) NOT NULL,
                monthly_income INT NOT NULL,
                monthly_expense INT NOT NULL,
                occupation_type VARCHAR(255) NOT NULL,
                account_no VARCHAR(255),
                dob_proof VARCHAR(255),
                identification_proof VARCHAR(255),
                income_proof VARCHAR(255),
                signature_proof VARCHAR(255),
                application_status VARCHAR(255) DEFAULT 'Submitted',
                submit_date DATETIME DEFAULT NOW(),
                handed_by INT,
                verify_date DATETIME,
                discard_reason VARCHAR(255),
                token_number CHAR(8),
                UNIQUE(token_number),
                FOREIGN KEY(handed_by) REFERENCES $table_employees(id)
            )";
      if(!mysqli_query($con, $sql)){
          echo "<br> Error creating table: " . mysqli_error($con);
      }

      $sql = "CREATE TABLE IF NOT EXISTS $table_account_open(
          application_no INT PRIMARY KEY AUTO_INCREMENT,
          account_type VARCHAR(255) NOT NULL,
          account_sub_type VARCHAR(255) NOT NULL,
          f_name VARCHAR(255) NOT NULL,
          m_name VARCHAR(255),
          l_name VARCHAR(255) NOT NULL,
          guardian_name VARCHAR(255),
          relation VARCHAR(255),
          gender VARCHAR(10) NOT NULL,
          dob DATE NOT NULL,
          nationality VARCHAR(255) NOT NULL,
          pan_exists CHAR(1) NOT NULL,
          pan_no VARCHAR(255) UNIQUE,
          aadhar_no VARCHAR(255) NOT NULL UNIQUE,
          current_address VARCHAR(255) NOT NULL,
          current_pincode VARCHAR(255) NOT NULL,
          current_district VARCHAR(255) NOT NULL,
          current_city VARCHAR(255) NOT NULL,
          current_state VARCHAR(255) NOT NULL,
          current_country VARCHAR(255) NOT NULL,
          permanent_address VARCHAR(255) NOT NULL,
          permanent_pincode VARCHAR(255) NOT NULL,
          permanent_district VARCHAR(255) NOT NULL,
          permanent_city VARCHAR(255) NOT NULL,
          permanent_state VARCHAR(255) NOT NULL,
          permanent_country VARCHAR(255) NOT NULL,
          residence_type VARCHAR(255) NOT NULL,
          stay_period VARCHAR(4) NOT NULL,
          mobile_no CHAR(10) NOT NULL,
          alt_mobile_no CHAR(10),
          email VARCHAR(255),
          instant_alert CHAR(1) NOT NULL,
          occupation_type VARCHAR(255) NOT NULL,
          salaried_type VARCHAR(255),
          company_name VARCHAR(255),
          company_address VARCHAR(255),
          monthly_income INT,
          customer_type VARCHAR(255) NOT NULL,
          customer_id VARCHAR(255),
          photo_proof VARCHAR(255),
          dob_proof VARCHAR(255),
          identification_proof VARCHAR(255),
          income_proof VARCHAR(255),
          application_status VARCHAR(255) DEFAULT 'Submitted',
          submit_date DATETIME DEFAULT NOW(),
          handed_by INT,
          verify_date DATETIME,
          discard_reason VARCHAR(255),
          token_number CHAR(8),
          UNIQUE(token_number),
          FOREIGN KEY(handed_by) REFERENCES employees(id)
      )";
      if(!mysqli_query($con, $sql)){
          echo "<br> Error creating table: " . mysqli_error($con);
      };

      $sql = "CREATE TABLE IF NOT EXISTS $table_loan_applications(
          application_no INT PRIMARY KEY AUTO_INCREMENT,
          f_name VARCHAR(255) NOT NULL,
          m_name VARCHAR(255),
          l_name VARCHAR(255) NOT NULL,
          guardian_name VARCHAR(255),
          gender VARCHAR(10) NOT NULL,
          dob DATE NOT NULL,
          nationality VARCHAR(255) NOT NULL,
          pan_no VARCHAR(255) UNIQUE,
          education_status VARCHAR(255) NOT NULL,
          marital_status VARCHAR(255) NOT NULL,
          religion VARCHAR(255) NOT NULL,
          caste VARCHAR(255) NOT NULL,
          aadhar_no VARCHAR(255) NOT NULL UNIQUE,
          dependants INT NOT NULL,
          current_address VARCHAR(255) NOT NULL,
          current_pincode VARCHAR(255) NOT NULL,
          current_district VARCHAR(255) NOT NULL,
          current_city VARCHAR(255) NOT NULL,
          current_state VARCHAR(255) NOT NULL,
          current_country VARCHAR(255) NOT NULL,
          permanent_address VARCHAR(255) NOT NULL,
          permanent_pincode VARCHAR(255) NOT NULL,
          permanent_district VARCHAR(255) NOT NULL,
          permanent_city VARCHAR(255) NOT NULL,
          permanent_state VARCHAR(255) NOT NULL,
          permanent_country VARCHAR(255) NOT NULL,
          residence_type VARCHAR(255) NOT NULL,
          stay_period VARCHAR(4) NOT NULL,
          mobile_no CHAR(10) NOT NULL,
          alt_mobile_no CHAR(10),
          email VARCHAR(255),
          occupation_type VARCHAR(255) NOT NULL,
          salaried_type VARCHAR(255),
          company_name VARCHAR(255) NOT NULL,
          designation VARCHAR(255) NOT NULL,
          company_address VARCHAR(255) NOT NULL,
          company_pincode INT NOT NULL,
          company_city VARCHAR(255) NOT NULL,
          company_state VARCHAR(255) NOT NULL,
          monthly_income INT NOT NULL,
          customer_type VARCHAR(255) NOT NULL,
          customer_id VARCHAR(255),
          other_acc_no VARCHAR(255),
          ather_bank_name VARCHAR(255),
          loan_amount INT NOT NULL,
          loan_tenure INT NOT NULL,
          photo_proof VARCHAR(255),
          identification_proof VARCHAR(255),
          income_proof VARCHAR(255),
          signature_proof VARCHAR(255),
          application_status VARCHAR(255) DEFAULT 'Submitted',
          submit_date DATETIME DEFAULT NOW(),
          handed_by INT,
          verify_date DATETIME,
          discard_reason VARCHAR(255),
          token_number CHAR(8),
          UNIQUE(token_number),
          FOREIGN KEY(handed_by) REFERENCES $table_employees(id)
      )";

        if(!mysqli_query($con, $sql)){
            echo "<br> Error creating table: " . mysqli_error($con);
        };

      
?>
