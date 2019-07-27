<?php

require_once "config.php";
require_once "classApi.php";

//SELECT category,count(category) FROM `candy` group by category ORDER BY count(category) DESC

class CandyApi extends API
{
    public function __construct($host, $user, $password, $db, $secret)
    {
        parent::__construct($host, $user, $password, $db, $secret);
    }

    /**
     * Add candy to database
     *
     * @param [string] $val
     * @param boolean $return_response
     * @return json response or hashed password
     */
    public function postCandy($data)
    {
        if(!is_array($data)){
            $this->send_response([], false, 'Error: postCandy param must be an array!');
        }

    }

    public function getCategories(){
        $sql = "SELECT distinct(type) FROM `candy` ORDER BY `candy`.`type` ASC;";

        $response = $this->runQuery($sql);

        $categories = [];

        foreach($response['data'] as $cat){
            foreach($cat as $key => $c){
                $c = str_replace('-',' ',$c);
                $c = ucwords($c);

                $categories[] = $c;
            }
        }

        $this->send_response($categories);
    }

    /**
     * get candy from database
     * 
     * @param [array] : params
     * @return [array] : results of query
     * 
     * @example
     * 
     * A parameter array: $params = ['column'=>'category','keyword'=>'mints']
     * Would result in: "SELECT * FROM candy WHERE category LIKE 'mints"
     * 
     * https://profgriffin.com/candy_store/api?route=candy&keyword=mints&column=category&start=50&chunk=10
     * A parameter array: $params = ['column'=>'category','keyword'=>'mints','start'=>0,'chunk'=>20]
     * Would result in: "SELECT * FROM candy WHERE category LIKE 'mints LIMIT 0 , 20"
     * 
     * https://profgriffin.com/candy_store/api?route=candy&keyword=lemon&column=title&matchtype=wildcard
     * A parameter array: $params = ['column'=>'title','keyword'=>'lemon','matchtype'=>'wildcard']
     * Would result in: "SELECT * FROM candy WHERE title LIKE '%lemon%'"
     * 
     * https://profgriffin.com/candy_store/api?route=candy&max=3.99&column=price
     * A parameter array: $params = ['column'=>'price','max'=>'3.99']
     * Would result in: "SELECT * FROM candy WHERE price < 3.99"
     * 
     * A parameter array: $params = ['column'=>'price','min'=>'14.99','max'=>'44.99']
     * Would result in: "SELECT * FROM candy WHERE price > 14.99 and price < 44.99"
     * 
     * https://profgriffin.com/candy_store/api?route=candy&min=14.99&column=price&start=10&chunk=10&max=44.99
     * A parameter array: $params = ['column'=>'price','min'=>'14.99','max'=>'44.99','start'=>'100','chunk'=>25]
     * Would result in: "SELECT * FROM candy WHERE price > 14.99 and price < 44.99 LIMIT 100 , 25"
     * 
     */
    public function getCandy($params){

        $where = '1';
        $start = null;
        $chunk = null;
        $column = null;
        $keyword = null;
        $min = null;
        $max = null;
        $matchtype = null;

        if(isset($params['column'])){
            $column = $params['column'];
        }

        if(isset($params['keyword'])){
            $keyword = $params['keyword'];
        }     

        if(isset($params['min'])){
            $min = $params['min'];
        }

        if(isset($params['max'])){
            $max = $params['max'];
        }

        if(isset($params['matchtype'])){
            $matchtype = $params['matchtype'];
        }

        if(isset($params['start'])){
            $start = $params['start'];
        }

        if(isset($params['chunk'])){
            $chunk = $params['chunk'];
        }

        if($column != 'price' && (($column && !$keyword) || ($keyword && !$column))){
            $this->send_response([],false,"If 'column' in params array, then 'keyword' needs to be as well and vice versa.");
        }

        if(((is_numeric($start) && !is_numeric($chunk)) || (is_numeric($chunk) && !is_numeric($start)))){
            $this->send_response([],false,"If 'start' in params array, then 'chunk' needs to be as well and vice versa.");
        }

        if($matchtype == 'wildcard'){
            $keyword = '%'.$keyword.'%';
        }

        $sql = "SELECT * FROM `candy` WHERE 1 ";

        if($column && $keyword){
            $sql .= "AND `{$column}` LIKE '{$keyword}'";
        }

        if($column == 'price' && is_numeric($min) && is_numeric($max)){
            $sql .= "AND  `{$column}` > {$min} AND `{$column}` < {$max} ";
        }else if($column == 'price' && is_numeric($min) && !$max){
            $sql .= "AND  `{$column}` > {$min} ";
        }else if($column == 'price' && is_numeric($max) && !$min){
            $sql .= "AND  `{$column}` < {$max} ";
        }

        if($start && $chunk){
            $sql .= " LIMIT {$start} , {$chunk}";
        }


        //$this->send_response([$params,$sql]);

        $response = $this->runQuery($sql);

        $response = $response['data'];

        if($start && $chunk){
            $response['start'] = $start;
            $response['chunk'] = $chunk;
        }

        // foreach($response['data'] as $c){
        //     $candy[] = $c;
        // }

        $this->send_response($response);
    }


    /**
     * get authorization for a user
     *
     * @param [array] $data : needs to contain email and password
     * @return response with succes:true
     */
    public function getAuth($data)
    {

        if (!array_key_exists('email', $data) || !array_key_exists('password', $data)) {
            $this->send_response([], false, 'Error: getAuth needs email and password!');
        } else {
            $email = $data['email'];
            $password = $data['password'];
        }

        // Create SQL statement
        $sql = "SELECT * FROM `users` where email like '{$email}';";

        $result = $this->conn->query($sql);

        // User exists because email was correct
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            // check password

            // password_verify is need to check a password created by password_hash
            if (password_verify($password, $row['password'])) {
                $this->send_response([], true);
            }

        }

        $this->send_response([], false, "Error: Failed to authenticate.");

    }

    /**
     * Registers a person by adding them to a users table in the database
     *
     * @param [array] $data : associative array with user info
     * @return response with success or fail.
     */
    public function doRegister($data)
    {
        $this->send_response($data);
        // Lets us access the global connection at the top

        $required = ['first-name', 'last-name', 'email', 'city', 'age', 'state', 'pwd1', 'pwd2'];

        foreach ($required as $field) {
            if (!array_key_exists($field, $data)) {
                $this->send_response($data, false, "Registration field: {$field} is required! ");
            }
        }

        // Pull names out of array (only for readability)
        $fname = $data['first-name'];
        $lname = $data['last-name'];
        $email = $data['email'];
        $city = $data['city'];
        $age = $data['age'];
        $state = $data['state'];
        $pwd1 = $data['pwd1'];
        $pwd2 = $data['pwd2'];

        // Do passwords match
        if ($pwd1 != $pwd2) {
            $this->send_response([], false, "Passwords do not match!!");
        }

        $hashed = password_hash($pwd1);

        // Create SQL statement
        $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `city`, `age`, `state`,`password`)
        VALUES ('{$fname}', '{$lname}', '{$email}', '{$city}', '{$age}', '{$state}', '{$hashed}');";

        $response = runQuery($sql);

        // Run the SQL query
        if ($response['success']) {
            $this->send_response([], true);
        } else {
            $this->send_response([], false, $response['error']);
        }
    }

}

