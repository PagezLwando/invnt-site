<?php
    //connect to database
    $db = mysqli_connect('localhost', 'root', '', 'invnt_db');

    if (isset($_POST['Export'])) {
        # code...

    $query = "SELECT * FROM invnt_tbl";
    $result = mysqli_query($db, $query);

    $file_ending = "csv";
    //header info for browser
    header("Content-Type: application/$file_ending");    
    header("Content-Disposition: attachment; filename=$filename.$file_ending");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    /**Start of Formatting for Excel**/   
    //define separator (defines columns in excel & tabs in word)
    $sep = ","; //tabbed character
    //start of printing column names as names of MySQL fields
    for ($i = 0; $i < mysql_num_fields($result); $i++) {
    echo mysql_field_name($result,$i) . "\t";
    }
    print("\n");    
    //end of printing column names  
    //start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=0; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
    }
}
?