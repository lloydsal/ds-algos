class Stack:

    stack = []

    def push(self, item):
        self.stack.append(item)

    def pop(self):
        return self.stack.pop()

    def isEmpty(self):
        return  len(self.stack) == 0

    def peek(self):
        return self.stack[len(self.stack) - 1]





stack = Stack()
stack.push(1)
stack.push(2)
stack.push(3)
stack.push(4)
stack.push(5)

# print('as')
print(stack.stack)
stack.pop()
print(stack.stack)
print(stack.peek())
