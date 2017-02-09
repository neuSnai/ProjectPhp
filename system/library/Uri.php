<?php
class Uri{
    //解析后的数组
    private  $segments;
    //原始请求uri
    private $requestUri;
    //服务器地址
    private $host;
    //按段获取请求url，从0开始
    public function __construct()
    {
        $this->segments=Cache::$uri['segments'];
        $this->host=Cache::$uri['host'];
        $this->requestUri=Cache::$uri['requestUri'];
    }

    public function segment($num){
        return $this->segments[$num];
    }
    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * @param mixed $segments
     */
    public function setSegments($segments)
    {
        $this->segments = $segments;
    }

    /**
     * @return mixed
     */
    public function getRequestUri()
    {
        return $this->oriUri;
    }

    /**
     * @param mixed $oriUri
     */
    public function setRequestUri()
    {
        $this->oriUri = $oriUri;
    }
    
}
?>
