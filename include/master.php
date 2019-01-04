<?php

class master {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function create($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'quote');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_pages($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'pages');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_Services($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'service_cat');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_Reviews($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        $img = $obj->saveImage($file, 'reviews');
        $param['student_image'] = $img;
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'reviews');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_Banner($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        $img = $obj->saveImage($file, 'event');
        $param['eventimage'] = $img;
        $result = $obj->insertRecord($param, 'event');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_pageContent($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'page_content');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_faq($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'faq');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Faq added successfully', 'data' => $param);
        }
        return $response;
    }

    public function add_title($param) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'sub_title');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function create_resume($param, $file) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        unset($param['ID']);
        unset($param['submit']);
        $img = $obj->saveImage($file, 'resume');
        $param['man_resume'] = $img;
        //$param['code'] = uniqid();
        $result = $obj->insertRecord($param, 'resume');
        if ($result > 0) {
            $param['ID'] = $result;
            $response = array('error' => false, 'message' => 'Record added successfully', 'data' => $param);
        }
        return $response;
    }

    public function getAll() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('category');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllfaq() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('faq');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllResumes() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('resume');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllPages() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('pages');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllTitle() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->titleView();
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllPageContent() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->pageContentView();
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllService() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('service_cat');
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllReviews() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('reviews');

        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Reviews fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllBanner() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('event');

        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Reviews fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getAllQuotes() {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectAllWithoutWhere('quote');

        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Reviews fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('category', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getPagesById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('pages', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getServiceById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('service_cat', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getfaqById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('faq', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getReviewsById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('reviews', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getBannerById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('banner', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getPageContentById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->pageContentById($id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getTitleById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->selectRowWithWhere('sub_title', 'ID=' . $id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function updatePages($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'pages', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updateService($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'service_cat', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updateReviews($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'reviews', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updateBanner($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'banner', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updatefaq($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'faq', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updatePageContent($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'page_content', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Page Content updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function updateTitles($data) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->updateRecordWithWhere($data, 'sub_title', 'ID=' . $data['ID']);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category updated successfully', 'data' => $data);
        }
        return $response;
    }

    public function deleteResumes($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('resume', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Resumes deleted successfully');
        }
        return $response;
    }

    public function deletePages($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('pages', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'pages deleted successfully');
        }
        return $response;
    }

    public function deleteService($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('service_cat', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Service Category deleted successfully');
        }
        return $response;
    }

    public function deleteReviews($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('reviews', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Reviews deleted successfully');
        }
        return $response;
    }

    public function deleteBanner($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('event', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Event deleted successfully');
        }
        return $response;
    }

    public function deletePageContent($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('page_content', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Reviews deleted successfully');
        }
        return $response;
    }

    public function deletefaq($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('faq', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Reviews deleted successfully');
        }
        return $response;
    }

    public function deleteQuotes($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('quote', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category deleted successfully');
        }
        return $response;
    }

    public function deleteTitles($id) {
        $response = array('error' => true, 'message' => 'Unable to update category');
        $obj = new common();
        $result = $obj->deleteRecordWithWhere('sub_title', 'ID=' . $id);
        if ($result > 0) {
            $response = array('error' => false, 'message' => 'Category deleted successfully');
        }
        return $response;
    }

    public function saveImage($file, $id) {
        $name = $file['name'];
        $temp_name = $file['tmp_name'];
        $extension = strtolower($this->getExtension($name));
        $key = 'image';
        $temp_file_name = $key . '.' . $extension;
        $dir = 'resumes/' . $id;
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $temp_file_path = 'resumes/' . $id . '/' . $temp_file_name;
        move_uploaded_file($temp_name, $temp_file_path);
        return $temp_file_path;
    }

    public function getpagecontentdetailsById($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->pageContentdetails($id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

    public function getpagecontentdetailsByGroup($id) {
        $response = array('error' => true, 'message' => 'Unable to get category');
        $obj = new common();
        $result = $obj->pageContentdetailsgroupBy($id);
        if (count($result) > 0) {
            $response = array('error' => false, 'message' => 'Category fetched successfully', 'data' => $result);
        }
        return $response;
    }

}
