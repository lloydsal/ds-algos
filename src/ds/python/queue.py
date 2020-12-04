class Queue:

    q = []

    # Add to queue
    def add(self, item):
        self.q.append(item)

    # Remove Top item ( first item )
    def remove(self):
        self.q.pop(0)

    def peek(self):
        return self.q[0]

    def isEmpty(self):
        return len(self.q) == 0




q = Queue()
q.add(1)
q.add(2)
q.add(3)
q.add(4)
print(q.q)

q.remove()
print(q.q)

print(q.peek())

print(q.isEmpty())