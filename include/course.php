<?php

class course {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function create($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to add course');
        $obj = new common();
        unset($param['ID']);
        $img = $obj->saveImage($file, 'courses');
        $param['image'] = $img;
        $param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'course');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function createGallery($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to add Image');
        $obj = new common();
        unset($param['ID']);
        $img = $obj->saveImage($file, 'gallery');
        $param['image_url'] = $img;
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'gallery');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Image added successfully', 'data' => $param);
        }
        return $response;
    }

    public function createFaculty($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to add Faculty');
        $obj = new common();
        unset($param['ID']);
        $img = $obj->saveImage($file, 'faculty');
        $param['image_url'] = $img;
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'faculty');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Faculty added successfully', 'data' => $param);
        }
        return $response;
    }

    public function getAll() {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('course');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Course fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllGallery() {
        $response = array('error' => true, 'message' => 'Unable to get images');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('gallery');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Images fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllFaculty() {
        $response = array('error' => true, 'message' => 'Unable to get faculty');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('faculty');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'faculty fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function admin_view_course() {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->adminviewcourse('course');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Course fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function admin_update_course_view($id) {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->adminCourseUpdate('`c`.`ID`=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Course fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getById($id) {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->selectRowWithWhere('course', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Course fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getGalleryById($id) {
        $response = array('error' => true, 'message' => 'Unable to get course');
        $obj = new common();
        $result = $obj->selectRowWithWhere('gallery', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Course fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllFacultyById($id) {
        $response = array('error' => true, 'message' => 'Unable to get faculty');
        $obj = new common();
        $result = $obj->selectRowWithWhere('faculty', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'faculty fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function updatePages($data) {
        $response = array('error' => true, 'message' => 'Unable to update course');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'pages', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Course updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updateFaculty($data) {
        $response = array('error' => true, 'message' => 'Unable to update faculty');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'faculty', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'faculty updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function delete($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('course', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Course deleted successfully');
        }
        return $response;
    }

    public function deleteFaculty($id) {
        $response = array('error' => true, 'message' => 'Unable to update faculty');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('faculty', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'faculty deleted successfully');
        }
        return $response;
    }

    public function deleteGalleryImages($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('gallery', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Image deleted successfully');
        }
        return $response;
    }

    public function getAllByCategoryCode($code) {
        $response = array('error' => true, 'message' => 'No course found');
        $obj = new common();
        $parent = $obj->selectRowWithWhere('category', '`code` = \'' . $code . '\'');
        if (count($parent) > 0) {
            $data = array($parent['ID']);
            $child = $obj->selectAllWithWhere('category', '`parent` IN (' . implode(',', $data) . ')');
            if (count($child) > 0) {
                foreach ($child as $ch) {
                    array_push($data, $ch['ID']);
                }
                $sub = $obj->selectAllWithWhere('category', '`parent` IN (' . implode(',', $data) . ')');
                if (count($sub) > 0) {
                    foreach ($sub as $su) {
                        array_push($data, $su['ID']);
                    }
                }
                $sub_sub = $obj->selectAllWithWhere('category', '`parent` IN (' . implode(',', $data) . ')');
                if (count($sub_sub) > 0) {
                    foreach ($sub_sub as $su) {
                        array_push($data, $su['ID']);
                    }
                }
            }
            $course = $obj->selectAllWithWhere('course', '`category_ID` IN (' . implode(',', $data) . ')');
            $response = array('error' => false, 'message' => 'Course found successfully', 'data' => $course);
        }

        return $response;
    }

    public function getSuggestions() {
        $data = [];
        $result = $this->conn->query('SELECT `c`.*, `ct`.`name` AS `cat_name` from `course` AS `c` LEFT JOIN `category` AS `ct` ON `ct`.`ID` = `c`.`category_ID`');
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $val = array('value' => $row['name'], 'data' => array('category' => $row['cat_name'], 'ID' => $row['ID']));
                array_push($data, $val);
            }
        }
        return $data;
    }

}
