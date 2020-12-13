<?php
//给定一个字符串，你的任务是计算这个字符串中有多少个回文子串。
//
// 具有不同开始位置或结束位置的子串，即使是由相同的字符组成，也会被视作不同的子串。 
//
// 
//
// 示例 1： 
//
// 输入："abc"
//输出：3
//解释：三个回文子串: "a", "b", "c"
// 
//
// 示例 2： 
//
// 输入："aaa"
//输出：6
//解释：6个回文子串: "a", "a", "a", "aa", "aa", "aaa" 
//
// 
//
// 提示： 
//
// 
// 输入的字符串长度不会超过 1000 。 
// 
// Related Topics 字符串 动态规划 
// 👍 449 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s) {
        $total = 0;
        $length = strlen($s);
        for ($i=0; $i<$length; $i++) {
            $jishuMid = $s{$i};
            $total++;

            //计算奇数个的回文
            $j = 1;
            while (($i-$j >= 0) && ($i+$j < $length)) {
                if ($s{$i-$j} == $s{$i+$j}) {
                    $total++;
                    $j++;
                } else {
                    break;
                }
            }

            //计算偶数个的回文
            $k = 0;
            while (($i-$k >= 0) && ($i+1+$k < $length)) {
                if ($s{$i-$k} == $s{$i+1+$k}) {
                    $total++;
                    $k++;
                } else {
                    break;
                }
            }
        }

        return $total;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
