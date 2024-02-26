<?php
class studentClass
{
  public $isConn;

  //لعرض رسائل الخط نعطيه اون
  public $ShowQryErrors = 'on'; //on or off

  //الاتصال بقاعدة البيانات 
  public function __construct($db_conn = array('host' => 'localhost', 'user' => 'root', 'pass' => '', 'database' => 'stu',))
  {
    $host = isset($db_conn['host']) ? $db_conn['host'] : 'localhost';
    $user = isset($db_conn['user']) ? $db_conn['user'] : 'root';
    $pass = isset($db_conn['pass']) ? $db_conn['pass'] : '';

    $database = isset($db_conn['database']) ? $db_conn['database'] : die('no database set');

    // Create connection
    $connection = mysqli_connect($host, $user, $pass, $database);

    // Check connection
    if (!$connection) {
      //echo ("conasfasdfas");
      die("Connection failed: " . mysqli_connect_error());
      return false;
    }
    if ($connection) {
      //echo ("conneted");
      $this->isConn = $connection;
    }
  }
  //Connect to database - End


  /*
    Different 5 types of queries
    - Select: all rows
    - Insert: add row(s)
    - Update: update field(s)
    - Delete: delete row(s)
    - Qry: general purpose query
  */

  //جلب سجلات الطلاب
  //دالة تستقبل جملة الاستعلام
  function Select($SQLStatement)
  {
    // Create connection
    $con =  $this->isConn;
    // Check connection
    if (!$con) {
      die("Connection failed in Select function - " . mysqli_connect_error());
    }
    // Connection is made
    if ($con) {
      $query = $con->query($SQLStatement);

      //Fail to run query.
      if (!$query) {
        //show error message
        if ($this->ShowQryErrors == 'on') {
          die(mysqli_error($con));
        }
      }

      $row = $query->num_rows;

      //no rows found
      if ($row < 1) {
        $result = $row;
      }
      //only one row of data
      else if ($row == 1) {
        $result = array($query->fetch_assoc());
      }
      //multiple rows
      else if ($row > 1) {
        $arry_d1 = array($query->fetch_assoc());

        $arry_d2 = array();
        while ($row = $query->fetch_assoc()) {
          $arry_d2[] = $row;
        }
        //merger array to get all rows
        $result = array_merge($arry_d1, $arry_d2);
      }
      //Will return a row data
      return $result;
    }
  }
  //Select - End


  //Insert - Start  
  function Insert($TableName, $row_arrays = array())
  {
    /*
      
      Call it like this:
      $db = new SimpleDBClass("host_name", "user_id", "password","database")
      $Qry = $db->Insert('table',$insert_arrays);

  */

    foreach (array_keys($row_arrays) as $key) {
      $columns[] = "$key";
      $values[] = "'" .  $row_arrays[$key] . "'";
    }
    //Get columns and values
    // convert to a seperating string by , 
    $columns = implode(",", $columns);
    $values = implode(",", $values);

    $sql = "INSERT INTO $TableName ($columns) VALUES ($values)";

    $con =  $this->isConn;

    // Check connection
    if (!$con) {
      die("Connection failed in query function - " . mysqli_connect_error());
    }

    if ($con) {
      $query = $con->query($sql);
      if (!$query) {
        //show error message
        if ($this->ShowQryErrors == 'on') {
          die(mysqli_error($con));
        }
        $result =  0;
      }
      if ($query) {
        //Will give the last inserted id
        $result =  $con->insert_id;
      }

      //Will return a row data
      return $result;
    }
  }
  //Insert - End

  //////
  ////// 

  //Update data function
  function Update($strTableName, $array_fields, $array_where)
  {

    //Get the update fields and value
    foreach ($array_fields as $key => $value) {
      if ($key) {
        //convert to key=value
        $field_update[] = " $key='$value'";
      }
    }
    $fields_update = implode(',', $field_update);

    //Get where fields and value
    foreach ($array_where as $key => $value) {
      if ($key) {
        $field_where[] = " $key='$value'";
      }
    }
    $fields_where = implode(' and ', $field_where);

    $SQLStatement = "UPDATE $strTableName  SET $fields_update WHERE $fields_where ";

    $con =  $this->isConn;

    // Check connection
    if (!$con) {
      die("Connection failed in query function - " . mysqli_connect_error());
    }

    if ($con) {
      $query = $con->query($SQLStatement);
      if (!$query) {
        //show error message
        if ($this->ShowQryErrors == 'on') {
          die(mysqli_error($con));
        }

        $result =  0;
      }
      if ($query) {
        $result = 1;
      }

      //Will return a row data
      return $result;
    }
  }
  //Update - End

  ////////////////////////////////////
  //inset new student 
  function InsertNewStudent($TableName, $row_arrays = array())
  {

    $con =  $this->isConn;
    $userName = $row_arrays['University_Number'];
    $password = $row_arrays['PhoneNamber'];
    $status = 1;
    $user_type = 1;
    $account_id = 0;
    if ($con) {
      $q1 = mysqli_query($con, 'INSERT INTO account(account.UserName,account.Type_ID,account.Status,account.password)
    VALUES(' . $userName . ',' . $user_type . ',' . $status . ',' . $password . ');');
      $con =  $this->isConn;
      if ($q1 && $con) {
        $q2 = app_db()->Select('SELECT * FROM account WHERE account.UserName=' . $userName . ';');
        foreach ($q2 as $row) {
          $account_id = $row['Account_ID'];
        }

        if ($account_id) {
          $row_arrays = array_merge($row_arrays, array('Account_ID' => $account_id));
          app_db()->Insert($TableName, $row_arrays);
        }
      }
    }
  } //ensert student end


  /*
//insert new teacher start
*/

  function InsertNewTeacher($TableName, $row_arrays = array())
  {
    $con =  $this->isConn;
    $userName = $row_arrays['Teacher_Name'];
    $password = $row_arrays['PhoneNamber'];
    // $status=1;
    // $user_type=2;
    $account_id = 0;
    $scond_arry = array(
      'UserName' => $userName,
      'Type_ID' => 2,
      'Status' => 1,
      'password' => $password,

    );
    $accont_tableName = "account";
    if ($con) {
      // $query1=mysqli_query($con,'INSERT INTO account(account.UserName,account.Type_ID,account.Status,account.password)
      // VALUES('.$userName.','.$user_type.','.$status.','.$password.');');
      $query1 = app_db()->Insert($accont_tableName, $scond_arry);
      $con =  $this->isConn;
      if ($query1 && $con) {
        $q2 = app_db()->Select('SELECT * FROM account WHERE account.UserName="' . $userName . '" ;');
        foreach ($q2 as $row) {
          $account_id = $row['Account_ID'];
        }

        if ($account_id) {

          $row_arrays = array_merge($row_arrays, array('Account_ID' => $account_id));
          app_db()->Insert($TableName, $row_arrays);
        }
      }
    }
  }
  //=>end insert e student

  //
  //()=>insert new librarian start
  //

  //insert new librarian end






  //Delete -function
  function Delete($strTableName, $array_where)
  {
    
    foreach ($array_where as $key => $value) {
      if ($key) {
        $field_where[] = " $key='$value' ";
      }
    }
    $fields_where = implode(' and ', $field_where);


    // Create connection
    $con =  $this->isConn;

    // Check connection
    if (!$con) {
      die("Connection failed in query function - " . mysqli_connect_error());
    }

    // start cheking if exiting 
    $QueryFindRecord = "SELECT * FROM $strTableName WHERE $fields_where ";



    //start deleting
    $QDeleteRec = "DELETE FROM $strTableName WHERE $fields_where";


    //echo $QDeleteRec;

    if ($con) {
      $isexit = $con->query($QueryFindRecord);
      $q = $con->query($QDeleteRec);
      if ($isexit) {
        //$con->query($QDeleteRec);
        $query = $con->query($QDeleteRec);
        if ($query) {
          $result = 1;
        }
        if (!$q) {
          $result = 0;
        }
        return $result;
      }


      echo "السجل غير موجود";
    }
  }
  //Delete - End




  //function for cleaning data for security propose
  //This will help in preventing sql injections
  function CleanDBData($Data)
  {
    /*
      This will help in preventing sql injections

      Call it like this:
      $db = new SimpleDBClass("host_name", "user_id", "password","database")
      $Qry = $db->CleanDBData($_POST["user_name"]); 
    */
    // Create connection
    $con =  $this->isConn;
    $str = mysqli_real_escape_string($con, $Data);
    return $str;
  }


  // for deleting html tags
  function CleanHTMLData($Data)
  {
    /*
      This will remove all HTML tags
      $db = new SimpleDBClass("host_name", "user_id", "password","database")
      $Qry = $db->CleanHTMLData($_POST["user_entry"]); 
    */

    // Create connection
    $con =  $this->isConn;
    $str = mysqli_real_escape_string($con, $Data);

    $result = preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $str);

    return $result;
  }
}
