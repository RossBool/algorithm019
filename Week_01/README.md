学习笔记


#### 设计循环双端队列

- 思考
  - 这道题考察的是对循环队列的运用，采用双指针的的方法，循环队列有几个问题需要注意，就是判空和判满问题，
    - 设定`front`为指向头部元素的指针。
    - 设定`tail`为指向待插入元素位置的指针，即每次新查无
  - 判断该队列是否为空时，`tail=front`
  - 判断该队列是否为满时，正常来说应该也是满足`tail=front`,此时代表tail指针追上了front指针，但是一般为了区别判空操作，队列一般会**多加一个位置，也就是队列长度capacity+1**来进行判断是否为满，满足**(tail + 1) % capacity == front**
- 数组下标越界情况，为防止指针溢出，每次移动指针都要进行**取模**。
  - 为了让指针的**下标**归到**队列长度**范围内，必须对队列长度**取模**，只要满足**（rear+1）%QueueSize==front**即可；
  - 为了防止指针的移动引起队列长度的变化，循环队列长度要满足**（rear-front+QueueSize）%QueueSize**；
  - 指针后移的时候，索引 + 1，要取模；
  - 指针前移的时候，为了循环到数组的末尾，需要先加上数组的长度，然后再对数组长度取模。(当做是head指针顺时针走到数组末尾)
- 代码实现
```js
//设计实现双端队列。 
//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Initialize your data structure here. Set the size of the deque to be k.
 * @param {number} k
 */
var MyCircularDeque = function (k) {
    // 人为定义浪费一个空间不存储元素，是为了区分队列为空或者为满的条件
    //申请多一个空间是为了判断队列是否满的条件
    this.capacity = k + 1
    //队列
    this.queue = []
    // 头指针
    this.front = 0
    // 尾指针
    this.tail = 0
};

/**
 * Adds an item at the front of Deque. Return true if the operation is successful.
 * @param {number} value
 * @return {boolean}
 */
MyCircularDeque.prototype.insertFront = function (value) {
    if (this.isFull()) {
        return false
    }
    //因为front指针必须要指向最左边的元素
    this.front = (this.front - 1 + this.capacity) % this.capacity
    this.queue[this.front] = value
    return true

};

/**
 * Adds an item at the rear of Deque. Return true if the operation is successful.
 * @param {number} value
 * @return {boolean}
 */
MyCircularDeque.prototype.insertLast = function (value) {
    if (this.isFull()) {
        return false
    }
    this.queue[this.tail] = value
    this.tail = (this.tail + 1 + this.capacity) % this.capacity
    return true

};

/**
 * Deletes an item from the front of Deque. Return true if the operation is successful.
 * @return {boolean}
 */
MyCircularDeque.prototype.deleteFront = function () {
    if (this.isEmpty()) {
        return false
    }
    this.front = (this.front + 1) % this.capacity;
    return true
};

/**
 * Deletes an item from the rear of Deque. Return true if the operation is successful.
 * @return {boolean}
 */
MyCircularDeque.prototype.deleteLast = function () {
    if (this.isEmpty()) {
        return false
    }
    this.tail = (this.tail - 1 + this.capacity) % this.capacity;
    return true

};

/**
 * Get the front item from the deque.
 * @return {number}
 */
MyCircularDeque.prototype.getFront = function () {
    if (this.isEmpty()) {
        return -1;
    }
    return this.queue[this.front]
};

/**
 * Get the last item from the deque.
 * @return {number}
 */
MyCircularDeque.prototype.getRear = function () {
    if (this.isEmpty()) {
        return -1;
    }
    // return this.queue[this.tail + 1]
    // 当 rear 为 0 时防止数组越界，取模
    return this.queue[(this.tail - 1 + this.capacity) % this.capacity];

};

/**
 * Checks whether the circular deque is empty or not.
 * @return {boolean}
 */
MyCircularDeque.prototype.isEmpty = function () {
    return this.tail === this.front
};

/**
 * Checks whether the circular deque is full or not.
 * @return {boolean}
 */
MyCircularDeque.prototype.isFull = function () {
    return (this.tail + 1) % this.capacity === this.front
};

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * var obj = new MyCircularDeque(k)
 * var param_1 = obj.insertFront(value)
 * var param_2 = obj.insertLast(value)
 * var param_3 = obj.deleteFront()
 * var param_4 = obj.deleteLast()
 * var param_5 = obj.getFront()
 * var param_6 = obj.getRear()
 * var param_7 = obj.isEmpty()
 * var param_8 = obj.isFull()
 */
//leetcode submit region end(Prohibit modification and deletion)

```


- 自我提问
- 不足

  - 做这道题之前没有想清除指针下标**取模**的意义何在；
  - 指针的使用不是很熟练，需要不断加强练习和总结。


#### 加一


- 思考

  - 末位进位，末位进位会导致前面一位也会进位，要继续算一下，直到没有进位为止;
  - 末位没有进位，这时候可以停止计算，直接返回;
  - 特殊进位，每一位都会进位的特殊数组，全部都要计算一遍，后面进行特殊处理。
- 代码
```javascript
/**
 * @param {number[]} digits
 * @return {number[]}
 */
var plusOne = function (digits) {

    //考虑各个位数相加进位的处理
    for (let i = digits.length - 1; i >= 0; i--) {

       //写法一：
         ++digits[i];
         digits[i] %= 10
         if (digits[i] !== 0) {
             return digits
         }
     
        //写法二：
        if (++digits[i] < 10) {
            return digits
        } 
        digits[i] = 0
    }

    //特殊数字的99,9,9999
    digits = [1, ...digits]
    return digits
};
```


- 自我提问
- 不足

####  第一周总结



1. 需要不断深化**寻找重复子单元**,特别是在做递归题目的时候，需要先找到递归终止条件和重复子单元的行为，从这反面入手解决问题。
2. 指针的使用，在解决边界问题，必须要充分利用好。
3. 栈的使用，在解决成对问题，遵循后进先出原则问题时，必须要学会使用。
4. 时间复杂度和空间复杂度需要相互平衡，需要借用外部辅助变量的就要用
5. 五毒神掌法实践，第一周就有种很煎熬的感觉，题目越来越多，如果都使用五毒神掌的话，真的需要花费大量时间，包括整流思路笔记，不过没办法，开弓没有回头箭，会继续坚持下去，希望能看到后面不一样的自己！！！！！



