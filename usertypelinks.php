<?php
class usertypelinks
{
private $usertypeid;
private $linkid;

    public function getUsertypeid()
    {
        return $this->usertypeid;
    }
    public function setUsertypeid($usertypeid)
    {
        $this->usertypeid = $usertypeid;
    }

    public function getLinkid()
    {
        return $this->linkid;
    }


    public function setLinkid($linkid)
    {
        $this->linkid = $linkid;
    }

}