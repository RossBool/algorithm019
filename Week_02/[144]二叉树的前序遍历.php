<?php
//给你二叉树的根节点 root ，返回它节点值的 前序 遍历。
//
//
//
// 示例 1：
//
//
//输入：root = [1,null,2,3]
//输出：[1,2,3]
//
//
// 示例 2：
//
//
//输入：root = []
//输出：[]
//
//
// 示例 3：
//
//
//输入：root = [1]
//输出：[1]
//
//
// 示例 4：
//
//
//输入：root = [1,2]
//输出：[1,2]
//
//
// 示例 5：
//
//
//输入：root = [1,null,2]
//输出：[1,2]
//
//
//
//
// 提示：
//
//
// 树中节点数目在范围 [0, 100] 内
// -100 <= Node.val <= 100
//
//
//
//
// 进阶：递归算法很简单，你可以通过迭代算法完成吗？
// Related Topics 栈 树
// 👍 453 👎 0


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
     * @return array
     */
    public function preorderTraversal($root)
    {

        //迭代法 遍历根左右树结点
        if (!$root) return [];

        $res = [];
        $stack = [];

        array_push($stack, $root);
        while (count($stack)) {
            $node = $stack[count($stack) - 1];
            array_push($res, $node->val);
            array_pop($stack);
            if ($node->right) {
                array_push($stack, $node->right);
            }
            if ($node->left) {
                array_push($stack, $node->left);
            }
        }

        return $res;


        //迭代法（前序遍历）
        $res = [];
        $stack = [];
        array_push($stack, $root);
//
        while (count($stack)) {
            $top = $stack[count($stack) - 1]; //出栈（左节点先出栈）
            array_pop($stack);
            array_push($res, $top->val);
            if ($top->right) { //先压右结点
                array_push($stack, $top->right);
            }
            if ($top->left) { //再压左结点
                array_push($stack, $top->left);
            }
        }
        return $res;
//        $res = [];
//      递归法
//        return $this->funcTest($res, $root);
    }

    public function funcTest(&$res, $root)
    {
        if (!$root) {
            return [];
        }
        array_push($res, $root->val); //根
        $this->funcTest($res, $root->left); //左
        $this->funcTest($res, $root->right); //右
        return $res;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
