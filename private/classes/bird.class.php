<?php

 class Bird {

    //-----START OF ACTIVE RECORD CODE------
    static protected $database;

    /**
     * sets the database connection
     *
     * @param   {string} $database  database connection
     *
     * @return  {void}
     */
    static public function set_database($database) {
        self::$database = $database;
    }

    /**
     * queries the DB
     *
     * @param   {string}  $sql  sql query
     *
     * @returns {string} returns an array of the object
     */
    static public function find_by_sql($sql) {
        $result = self::$database->query($sql);
        if(!$result) {
            exit("Database query failed");
        }
        //convert the results into objects
        $object_array = [];
        while($record = $result->fetch_assoc()) {
            $object_array[] = self::instantiate($record);
        }
        $result->free();

        return $object_array;
    }

    /**
     * finds everything in the bird table
     *
     * @returns {string} returns the query
     */
    static public function find_all() {
        $sql = "SELECT * FROM birds";
        return self::find_by_sql($sql);
    }

    /**
     * [find_by_id description]
     *
     * @param {integer}  $id the id of the bird
     *
     * @returns {string} returns an object array or a bool value
     */
    static public function find_by_id($id) {
        $sql = "SELECT * FROM birds ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        $object_array = self::find_by_sql($sql);
        if(!empty($object_array)) {
            return array_shift($object_array);
        } else {
            return false;
        }
    }
 
    /**
     * [instantiate description]
     *
     * @param {string}  $record the record to instantiate
     *
     * @returns {string} the new object
     */
    static protected function instantiate($record) {
        $object = new self;
        //could manually assign values to properties
        //but automatic assignment is faster, easier, & re-usable
        foreach($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }
    //-----END OF ACTIVE RECORD CODE------
    public $id;
    public $common_name;
    public $habitat;
    public $food;
    public $backyard_tips;
    protected $conservation_id;

    protected const CONSERVATION_OPTIONS = [ 
        1 => "Low concern",
        2 => "Medium concern",
        3 => "High concern",
        4 => "Extreme concern"
    ];

    /**
     * [__construct]
     *
     * @param {string} array
     *
     * @returns {void}
     */
    public function __construct($args=[]) {
        $this->common_name = $args['common_name'] ?? '';
        $this->habitat = $args['habitat'] ?? '';
        $this->food = $args['food'] ?? '';
        $this->nest_placement = $args['nest_placement'] ?? '';
        $this->behavior = $args['behavior'] ?? '';
        $this->backyard_tips = $args['backyard_tips'] ?? '';
        $this->conservation_id = $args['conservation_id'] ?? '';
    }

    /**
     * [conservation description]
     *
     * @returns {string} conservation description
     */
    public function conservation() {
        if( $this->conservation_id > 0 ) {
            return self::CONSERVATION_OPTIONS[$this->conservation_id];
        } else {
            return "Unknown";
        }
    }


}