<?php
/**
 * Created by PhpStorm.
 * User: doduc
 * Date: 28/08/2019
 * Time: 12:09 CH
 */

namespace Comingsoon\Helper;

/**
 * Class Validation
 * @package Comingsoon\Helper
 */
class Validation
{ /**
 * @var array
 */
    protected static $aConditionals = [];//Mảng lưu các key là các giá trị, value là các giá trị cần validate
    /**
     * @var array
     */
    protected static $aData = [];
    /**
     * @return array
     * @param string $rawConditionals
     * analyze validate conditional
     */
    protected static function parseConditional($rawConditionals)
    {
        $aRawParse = explode(
            "|",
            trim($rawConditionals)
        );
        $aConditionals = array();
        foreach ($aRawParse as $con) {
            $aConditionAndParams = explode(
                ":",
                trim($con)
            );
            $aConditionals[]     = array(
                "func" => trim($aConditionAndParams[0]),
                "param" => isset($aConditionAndParams[1]) ? trim(
                    $aConditionAndParams[1]
                ) : ""
            );
        }
        return $aConditionals;
    }
    /**
     * @return array
     */
    protected static function success()
    {
        return array("status" => "success");
    }
    /**
     * @param $msg
     * @return array
     */
    protected static function error($msg)
    {
        return array(
            "status" => "error",
            "msg" => $msg
        );
    }
    /**
     * @param $key
     * @param $length
     * @return mixed
     */
    protected static function maxLength($key, $length)
    {
        //Nếu độ dài không tồn tại hoặc bằng 0
        if (!isset(self::$aData[$key]) || empty(self::$aData[$key])) {
            return self::success();
        }
        //Kiểm tra chiều dài của chuỗi
        if (strlen(self::$aData[$key]) > $length) {
            return self::error(
                "The maximum length of " . $key . " is " . $length
            );
        }
        return self::success();
    }
    /**
     * @return array
     * Checking does component of $__POST['array()'] exist
     * @param $key
     */
    protected static function required($key)
    {
        if (!isset(self::$aData[$key]) || empty(self::$aData[$key])) {
            return self::error("The " . $key . " is required");
        }
        return self::success();
    }

    /**
     * @return array
     *
     * @param $key
     */
    protected static function email($key)
    {
        if (!isset(self::$aData[$key]) || empty(self::$aData[$key])) {
            return self::success();
        }
        if (!filter_var(self::$aData[$key], FILTER_VALIDATE_EMAIL)) {
            return self::error("Invalid email address");
        }
        return self::success();
    }
    /**
     * @return array
     * Checking theimage files formating
     * @param $key
     */
    protected static function checkImageType($key)
    {
        $type = array(
            "image/jpeg",
            "image/jpg",
            "image/bmp",
            "image/gif",
            "image/png"
        );
        if (!in_array(self::$aData[$key], $type)) {
            return self::error("Invalid image " . $key);
        }
        return self::success();
    }

    /**
     * @return array
     *
     * @param $size
     * @param $key
     */
    protected static function maxSize($key, $size)//Max Size
    {
        //If size not exist or 0
        if (!isset(self::$aData[$key]) || empty(self::$aData[$key])) {
            return self::success();
        }
        //Checking the size of Images
        if (self::$aData[$key] > $size) {
            return self::error("The maximum size of " . $key . " is " . $size);
        }
        return self::success();
    }
    /**
     * @return bool
     *
     * @param $key
     * @param $aConditionals
     */
    //Checking the conditionals
    protected static function checkConditional($aConditionals, $key)
    {
        //Duyệt các phần tử mảng
        foreach ($aConditionals as $aConditional) {
            if (!method_exists(__CLASS__, $aConditional["func"])) {
                throw new \RuntimeException(
                    "Method with name " . $aConditional["func"]
                    . " does not exist"
                );
            } else {
                $aStatus = call_user_func_array(
                    array(__CLASS__, $aConditional["func"]),
                    array($key, $aConditional["param"])
                );
                if ($aStatus["status"] == "error") {
                    return $aStatus["msg"];
                }
            }
        }
        return true;
    }

    /**
     * @return bool
     *
     * @param $aData
     * @param $aConditionals
     */
    public static function validate($aConditionals, $aData)
    {
        self::$aData = $aData;
        //Duyệt mảng các giá trị cần validate
        foreach ($aConditionals as $key => $rawConditionals) {
            //Analyze the condition validate
            $aConditionals = self::parseConditionals($rawConditionals);
            //Check the conditions
            $status = self::checkConditional($aConditionals, $key);
            if ($status !== true) {
                return $status;
            }
        }
        self::$aData = [];
        return true;
    }
}