<?php

class fill{
        private static $_alphas = [
            'a', 'b', 'c', 'd', 'e', 'f', 'g',
            'h', 'i', 'j', 'k', 'l', 'm', 'n',
            'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        ];


        //自动生成汉字
        public function getChar( $num )  // $num为生成汉字的数量
        {
           $b = '';
           for ($i = 0; $i < $num; $i++) {
               // 使用chr()函数拼接双字节汉字，前一个chr()为高位字节，后一个为低位字节
               $a = chr(mt_rand(0xB0, 0xD0)) . chr(mt_rand(0xA1, 0xF0));
               // 转码
               $b .= iconv('GB2312', 'UTF-8', $a);
           }
           return $b;
        }

        public function Englishname($minLenth,$maxlength)
        {
        $word = '';
        if ($minLenth > $maxlength ){
            $tamp = $minLenth;
            $minLenth = $maxlength;
            $maxlength = $tamp;
        }

        $wordLength = mt_rand($minLenth, $maxlength);

        while ($wordLength--) {
            $index = mt_rand(0, 25);
            $word .= self::$_alphas[$index];
        }

        return $word;

        }


        /**生成规定时间范围内的一个随机日期
         * @param $start:开始时间
         * @param $end:结束时间
         * @return false|string
         */
        public function getData($start='', $end='')
        {
            if (empty($start) && empty($end)){
                return date('Y-m-d',time());
            }
            $startTime = $this->checkDate(trim($start));
            $endTime = $this->checkDate(trim($end));

            if ($startTime[1]>$endTime[1] ){
                $tamp = $startTime;
                $startTime = $endTime;
                $endTime = $tamp;
            }

            $MaxDay = intval(max($startTime[3],$endTime[3]));
            $minDay = intval(min($startTime[3],$endTime[3]));
            //var_dump($dayData);

            return mt_rand($startTime[1],$endTime[1]).'-'.mt_rand($startTime[2],$endTime[2]).'-'.mt_rand($minDay,$MaxDay);
        }

        /**时间校验
        * @param $param
        * @return mixed
        */
        public function checkDate($param){
            if(preg_match('/([0-9]{4})-([0-9]{2})-([0-9]{2})/',$param,$Time)){
                return $Time;
            }else{
        //                var_dump($param);
                die($param.'日期格式不正确');
            }
        }


        /**id生成
        * @param string $num:需要 取的位数
        * @return int|string
        */
        function  getUuid($num='')
        {
            if (!empty($num)){
                $Setnum = time().mt_rand(0,999);
                return  mt_rand(0,substr ( $Setnum, 0, 5 ));
            }

            $chars = md5(uniqid(mt_rand(), true));
            $uuid = substr ( $chars, 0, 8 ) . '-'
                . substr ( $chars, 8, 4 ) . '-'
                . substr ( $chars, 12, 4 ) . '-'
                . substr ( $chars, 16, 4 ) . '-'
                . substr ( $chars, 20, 12 );
            return $uuid ;
        }


        /**
        * 生成标识：0,1
        */
        public function getGender()
        {
        return intval(mt_rand(0,1));
        }

    }

?>