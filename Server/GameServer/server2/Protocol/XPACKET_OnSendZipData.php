<?php
/**
	Auto generated by xproto.exe
@author
	Dany
*/
require_once("XByteArray.php");


	class XPACKET_OnSendZipData
	{
		    public static  $_m_xcmd/*:int*/=_EMSG_ServerEvent::SMSG_OnSendZipData;

	    
		public $zipData="";/*UCHAR[]*/

	    
	    public function XPACKET_OnSendZipData()
		{
	
		}
			
		public static function _Size($zipData/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;

            $__xv +=4;//LENGHT
            $__xv +=4;//_m_xcmd
            $__xv +=4;//XByteArray::GetDynamicLengthNumBytes(zipData.length);
            $__xv +=1*strlen($zipData);

			return $__xv;
		}
				
		public static function _ToBuffer($__dst/*XByteArray*/,$zipData/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;

			$__dst->writeInt32(XPACKET_OnSendZipData::_Size($zipData/*:UCHAR[] */ ));
			$__xv +=4;
			$__dst->writeInt32(XPACKET_OnSendZipData::$_m_xcmd);
			$__xv +=4;

            //Write codes of zipData
            //
            $__num = strlen($zipData);
            $__xv +=XByteArray::WriteDynamicArrayLength($__dst,$__num);
            $__dst->writeBinary($zipData,$__num);
            $__xv +=$__num;
            

			return $__xv;
		}
		
		public static function _ClassFromParameters($zipData/*:UCHAR[] */ )
		{
			$_class = new XPACKET_OnSendZipData();

            $_class->zipData=$zipData;
			
			return $_class;
		}


		public function FromBuffer($__src/*:XByteArray*/)
		{
			$__xv					= 0;
			$i						=0;
			$__xvBeanSize	=0;


            //Read codes of __xvtemp1
            //
            if($__src->getBytesAvailable()>=4)
            {
                $this->__xvtemp1=$__src->readInt32();
                $__xv +=4;
            }
            else
            {
                return 0;
            }

            //Read codes of __xvtemp2
            //
            if($__src->getBytesAvailable()>=4)
            {
                $this->__xvtemp2=$__src->readInt32();
                $__xv +=4;
            }
            else
            {
                return 0;
            }

            //Read codes of zipData
            //
            $__zipData_arrlen = new XInteger();
            $__xv +=XByteArray::ReadDynamicArrayLength($__src,$__zipData_arrlen);
            if($__zipData_arrlen->_value<0)
            {
                return 0;
            }
            if($__src->getBytesAvailable()>=$__zipData_arrlen->_value)
            {
                $this->zipData=$__src->readBinary($__zipData_arrlen->_value);
                $__xv +=$__zipData_arrlen->_value;
            }
            else 
            {
                return 0;
            }
            

			return $__xv;
		}
		
		public function ToBuffer($__dst/*XByteArray*/)
		{
			return XPACKET_OnSendZipData::_ToBuffer($__dst,$this->zipData );
		}
		
		public function Size()
		{
			return XPACKET_OnSendZipData::_Size($this->zipData );
		}

    public  function FromXml(/*XP_XMLNODE_PTR*/ $pNode)
    {

        $this->zipData = XFROM_XML($this->zipData,$pNode,"zipData",4,"",0);

		  	return 0;
    }
    
    public  function   ToXml(/*XSTRING_STREAM & out*/)
    {
        $__xv_out="";

        $__xv_out .= XTO_XML($this->zipData,"zipData",4, 0);

        return $__xv_out;
    }
    
    public   function fromAMFObject($pNode)
    {
       
        
        $this->zipData = XFROM_AMFOBJECT($this->zipData,$pNode,"zipData",4,"",0);

        return 0;
    }
		
	private static function ParamDebugString($param)
    {
    	if (is_object($param))
    	{
    		return $param->ToDebugString();
    	}
    	else if (is_array($param))
    	{
    		$str = "(";
    		foreach($param as $p)
    		{
    			if( is_object($p) )
    			{
    				$str .= $p->ToDebugString().",";
			}
			else
			{
				$str .= strval($p).",";
			}
    		}
    		$str .= ")";
    		$str = str_replace(",)",")",$str);
    		return $str;
    	}
    	
    	return strval($param);
    } 
    
	public  function ToDebugString()
    {
    	if(XPACKET_OnSendZipData::$_m_xcmd == _EMSG_ServerEvent::SMSG_OnSendZipData){
    		return "([ignore zip data])";
    	}
		
    	$__xv_out  = "(";
    	
        $__xv_out .= "zipData=".$this->ParamDebugString($this->zipData).",";

    	
    	$__xv_out  .= ")";
    	
    	$__xv_out = str_replace(",)",")",$__xv_out);
    	
    	return $__xv_out;
    }
    
   	public static function toAMFObject($__dst/*XByteArray*/,$zipData/*:UCHAR[] */ )
		{
			$__xv	= 0;
			$i		=0;
      $obj = array();

        $obj["zipData"]=$zipData ;

      if(count($obj)>0)
      {
          $outBuffer  = WriteAMF3Object($obj);
          $__xv = strlen($outBuffer);
          $__xv+=8;
          $__dst->writeInt32($__xv);
          $__dst->writeInt32(XPACKET_OnSendZipData::$_m_xcmd);
          $__dst->writeBinary($outBuffer,strlen($outBuffer));
      }
      else
      {
          $__xv =8;
          $__dst->writeInt32($__xv);
          $__dst->writeInt32(XPACKET_OnSendZipData::$_m_xcmd);
      }
      
      
			return $__xv;
		}
	}
	
	
?>