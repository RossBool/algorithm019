<?php
//给定一个二叉树，返回它的 后序 遍历。
//
// 示例:
//
// 输入: [1,null,2,3]
//   1
//    \
//     2
//    /
//   3
//
//输出: [3,2,1]
//
// 进阶: 递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树
// 👍 475 👎 0


//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    public function postorderTraversal($root)
    {
        // 迭代法
        //  根据前序遍历遍历的节点
        //  先遍历右子树，再遍历左子树
        // 遍历结果的时候，反向输出
        $cur = $root;
        $res = [];
        $stack = [];
        if (!$root) {
            return [];
        }
        while (count($stack) || $cur) {

            while ($cur) {
                array_push($res, $cur->val);
                array_push($stack, $cur);
                $cur = $cur->right;
            }
            $tmp = $stack[count($stack) - 1];
            array_pop($stack);
            $cur = $tmp->left;
        }

        return array_reverse($res);


//        递归法
        $res = []; // 结果
        return $this->funcTest($res, $root);
    }

    public function funcTest(&$res, $root)
    {
        if (!$root) {
            return [];
        }
        $this->funcTest($res, $root->left); //左
        $this->funcTest($res, $root->right); //右
        array_push($res, $root->val); //根
        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
