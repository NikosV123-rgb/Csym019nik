<?php

$connect = new PDO("mysql:host=localhost;dbname=mydb_012", "root", "");

if(isset($_POST["action"]))
{
    if($_POST["action"] == 'fetch')
    {
        $course_column = array('id', 'title', 'overview', 'highlights', 'course_details', 'entry_requirements', 'fees_and_funding', 'faqs');
        
        $main_query = "SELECT id, SUM(title) AS title, fees_and_funding FROM courses";
        
        $search_query ='';
        
        if(isset($_POST["search"]["value"])){
            $search_query .= '(id LIKE "%'.$_POST["search"]["value"].'%" OR name LIKE "%'.$_POST["search"]["value"].'%" OR highlights LIKE "%'.$_POST["search"]["value"].'%")';
        }
        
        $group_by_query = "GROUP BY id";
        
        $course_by_query = "";
        
        if(isset($_POST["course"])){
            $course_by_query = 'ORDER BY '.$course_column[$_POST['course']['0']['column']].' '.$_POST
                    ['course']['0']['dir'].' ';
        }
        else{
            $course_by_query = 'ORDER BY id';
        }
        if($_POST["length"]!= -1){
        $limit_query = 'LIMIT ' .$_POST['start'] . ', ' .$_POST['length']; 
    }
    
    $statement = $connect->prepare($main_query . $search_query . $group_by_query . $order_by_query);
    
    $statement->execute();
    
    $filtered_rows = $statement->rowCount();
    
    $statement = $connect ->prepare($main_query . $group_by_query);
    
    $statement ->execute();
    
    $total_rows = $statement->rowCount();
    
    $result = $connect->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);
    
    $data = array();
    
    foreach($result as $row){
        $sub_array = array();
        
        $sub_array[] = $row['id'];
        
        $sub_array[] = $row['title'];
        
        $sub_array[] = $row['fees_and_funding'];
        
        $data[] = $sub_array;
    }
    
    $output = array(
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => $total_rows,
        "recordsFiltered" => $filtered_rows,
        "data" =>$data
    );
    
    echo json_encode($output);
    }
}

?>
