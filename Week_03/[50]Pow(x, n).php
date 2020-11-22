<?php
//实现 pow(x, n) ，即计算 x 的 n 次幂函数。
//
// 示例 1: 
//
// 输入: 2.00000, 10
//输出: 1024.00000
// 
//
// 示例 2: 
//
// 输入: 2.10000, 3
//输出: 9.26100
// 
//
// 示例 3: 
//
// 输入: 2.00000, -2
//输出: 0.25000
//解释: 2-2 = 1/22 = 1/4 = 0.25 
//
// 说明: 
//
// 
// -100.0 < x < 100.0 
// n 是 32 位有符号整数，其数值范围是 [−231, 231 − 1] 。 
// 
// Related Topics 数学 二分查找 
// 👍 544 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        // 拆分 成子问题，进行递归
        //  分治
//        if ($n == 0) {
//            return 1.0; //指数为0  所有值为1
//        }
//
//        if ($n == 1) {
//            return $x;
//        }
//
//        if ($n < 0) {
//            $x = 1 / $x; //底数转换成x分之一
//            $n = -$n; //指数 转成正数
//        }
//
////      先把问题分解，先进行递归，然后把结果聚合
//        $res = $this->myPow($x, $n / 2);
//        return $n % 2 == 1 ? $res * $res * $x : $res * $res;
//      分治 （问题拆分，最后聚集结果）
//     递归模板
//        recursion  terminator
        if ($n == 0) {
            return 1.0;
        }

//        process logic
        if ($n < 0) {
            $x = 1 / $x;
            $n = abs($n);
        }

        $res = $this->myPow($x, $n / 2);
//        drill  down
        if ($n % 2 == 1) {
            return  ($res * $res * $x);
        } else {
            return  ($res * $res);
        }
//       revert data
    }
}
//leetcode submit region end(Prohibit modification and deletion)
