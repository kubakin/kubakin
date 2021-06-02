start = 1 # начинаем с нуля
dots = dict()
dots[1] = {3:1, 4:1} # из точки 0 есть пути в 1 2 и 3
dots[2] = {3:1, 4:1, 5:1,6:1} # из точки 0 есть пути в 1 2 и 3
dots[3] = {1:1, 2:1} # из точки 1 в 0 2 и 3
dots[4] = {1:1, 2:1} # из точки 1 в 0 2 и 3
dots[5] = {2:1, 6:1}
dots[6] = {2:1, 5:1}
stack = [] # СТЭК
stack.append(start)
tek = start
main = []

def func(tk):
    for i in dots[tk].keys():
        if dots[tk][i] == 1:
            stack.append(i)
            dots[tk][i] = 0
            dots[i][tk] = 0
            func(i)
    main.append(stack.pop())
    return

while stack:
    func(stack[len(stack)-1])

print(main)
