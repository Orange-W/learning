<?php
/**
 * Created by PhpStorm.For Authorize Center
 * User: user
 * Date: 15/4/26
 * Time: 20:34
 */
header('Content-Type:application/json; charset=utf-8');
class Authorize {
    static $instance='';//single Authorize
    private $postAppInformation = array('appId','appKey');//necessary post
    private $postNotice= array('operation','mainNotice', 'extra');//necessary notice post
    private $postSecret = array('time','string','secret');//necessary secret post
    private $salty="nmid_orange_for_example";   //class inner secretKey
    private $timeOut = 5;           //  checkTime: 5min
    private $illegelObject;//register for illegal request
    private $registList=array(
        -1=>array('appId'=>'asdDFU32232sad','appKey'=>'exampleAppKey','url'=>'http://example.com')
    );//just a example appId and appKey should be at least 16bit,for safe.

    private $status= [         //status information
        '-1'    =>  'illegal operation!',
        '404'   =>  '404 not find',
        '405'   =>  'Data wrong!',
        '707'   =>  'Parameter lost!',
        '708'   =>  'Parameter wrong!',
        '709'   =>  'App information wrong!',
        '801'   =>  'Time out!',
        '804'   =>  'illegal request, ban this IP.',
        '901'   =>  'appId repeat!',
    ];


    /*******************************/
    /*****  public function  ******/
    /*****************************/
    private function __construct(){}
    private function  __clone(){}
    public static function get_instance()
    {
        if(!(self::$instance instanceof self))
        {
            self::$instance=new self();
        }
        return self::$instance;
    }

    /**
     * @For post Authorize
     */
    public function Authorize(){
        $secret = $this->checkPost($this->postSecret);
        $app = $this->checkPost($this->postAppInformation);
        $this->checkTime();
        if(!$this->checkSecret($secret))   $this->badReturn(708);
        if(!$this->checkAppInformation($app))   $this->badReturn(709);

        return true;
    }

    /**
     * @For  receive Notice
     */
    public function receiveNotice(){
        $secret = $this->checkPost($this->postSecret);
        $notice = $this->checkPost($this->postNotice);
        $this->checkTime();
        if(!$this->checkSecret($secret))   $this->badReturn(708);
        if(!$this->checkSecret($notice))   $this->badReturn(709);
        return $notice;
    }

    /**
     * @param        $appId
     * @param        $appKey
     * @param        $info
     * @param        $noticeUrl
     * @param string $extra
     * @For  add user register
     */
    public  function    addRegister($appId,$appKey,$info,$noticeUrl,$extra=''){
        if($this->returnRegister($appId))  $this->badReturn(901);
        $data=array(
            'appId'    =>   $appId,
            'appKey'   =>   $appKey,
            'info'     =>   $info,
            'url'      =>   $noticeUrl,
            'extra'    =>   $extra,
        );
        $this->registList[]=$data;
    }

    /**
     * @return string
     * @For  produce Secret Key
     */
    public function getSecret(){
        $time=time();
        $str = 'abcdefghijklnmopqrstwvuxyz1234567890ABCDEFGHIJKLNMOPQRSTWVUXYZ';
        $string='';
        for($i=0;$i<16;$i++){
            $num = mt_rand(0,61);
            $string .= $str[$num];
        }
        $secret =$this->toHash($time,$string);
        $arr=array('secret'=>$secret,'time'=>$time,'string'=>$string);
        return $arr;
    }

    /**
     * @param        $operation :   sign for operation
     * @param string $mainNotice
     * @param string $extra :   other information
     * @param string $to_appId
     * @For  send Notice to user of register
     */
    public function sendNotice($operation,$mainNotice='',$extra='',$to_appId='all'){
        $notice=$this->getSecret();
        $notice['operation'] =  $operation;
        $notice['mainNotice'] =  $mainNotice;
        $notice['extra'] =  $extra;

        if($to_appId=='all'){
            foreach($this->registList as  $key2 => $register){
                $this->sendOut($notice,$register['url']);
            }
        }else{
            foreach($to_appId as  $key => $value){
                foreach($this->registList as  $key2 => $register){
                    if($value == $register['appId'])    $this->sendOut($notice,$register['url']);
                }
            }
        }
    }



    public function returnRegister($appId){
        foreach($this->registList as  $key2 => $register){
            if(($register['appId']==$appId)?true:false)   return $register;
        }

        return false;
    }

    public function printAllRrgister(){print_r($this->registList);}
    public function setIllegelObject($obc){$this->illegelObject = $obc;}


    /******************************/
    /*****  private function  *****/
    /******************************/

    /**
     * @param $post
     * @return bool
     * @For  check secret right or not
     */
    private function checkSecret($post){
        $key = $post['secret'];
        $postKey = $this->toHash($post['time'],$post['string']);
        if($key == $postKey)    return true;
        else    return false;
    }

    /**
     * @param $post
     * @return bool
     * @For  check App's Information
     */
    private function checkAppInformation($post){
        $appId = $post['appId'];
        $appKey = $post['appKey'];
        $imformation = $this->returnRegister($appId);
        if($imformation['appKey'] == $appKey)    return true;
        else    return false;
    }


    /**
     * @For  check the time right
     */
    private function checkTime(){
        if($_POST['time'] + 60 * $this->timeOut < time())    $this->badReturn(801);
        if($_POST['time'] > time()){
            $this->badReturn(804);
        }
    }


    /** hash secret Function
     * @param $time
     * @param $string
     * @return string
     */
    private function toHash($time,$string){
        return sha1(sha1($time).md5($string).$this->salty);
    }


    /**
     * @param array|string $array
     * @return mixed
     * @For  check the post isHas or not and remove the useless param
     */
    private function checkPost($array=array()){
        $return=array();
        foreach($array as $key => $value ){
            if(!isset($_POST["$value"])){$this->badReturn(707);}
            else    $return[$value] = $_POST["$value"];

        }
        return $return;
    }

    private function sendOut($post,$web){
        header('Content-Type:application/json; charset=utf-8');
        $send="";
        foreach($post as $p=>$value){
            $send .= '&'.$p."=".$value;
        }
        $curlPost = $send;
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$web);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl,CURLOPT_POSTFIELDS,$curlPost);
        $contents = curl_exec($curl);
        curl_close($curl);
        return $contents;
    }


    /*******************************/
    /******  wrong operation  *****/
    /*****************************/

    /**
     * @param        $status
     * @param string $dataType
     * @param string $returnWay
     * @return array|string
     * @For  return bad information and status
     */
    private function badReturn($status,$dataType='json',$returnWay='exit'){
        if($this->illegelObject!=null)    $this->illegelObject->dealWrongRequest($status);
        $arr = array('status'=>$status,'info'=>$this->status[$status]);
        $backTo = ($dataType=='json')?json_encode($arr):$arr;
        if($returnWay=='return')    return ($backTo);
        elseif($returnWay=='exit')    exit($backTo);
        else    $returnWay($backTo);
    }


    /**** example for dealing wrong Operation ***/

    private function dealWrongRequest($status){
        echo ($status.':just  a example for dealing with registWrongRequest!<br/>');
    }

}


$Yz = Authorize::get_instance();
$arr = $Yz->getSecret();
$_POST=array('appId'=>'asdDFU32232sad','appKey'=>'exampleAppKey',
             'time'=>$arr['time'],'string'=>$arr['string'],'secret'=>$arr['secret']);
print_r($_POST);
$Yz->addRegister('123','exampleAppKey','http://localhost/au/Yz.php','',$extra='测试的额外信息');
$Yz->setIllegelObject($Yz);
//print_r($Yz->returnRegister('123'));
//$Yz->printAllRrgister();
$Yz->sendNotice('changeImg','helloWorld','测试信息');
$Yz->Authorize();



//print_r($Yz->receiveNotice());
















