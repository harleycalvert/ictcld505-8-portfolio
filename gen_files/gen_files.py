for i in range(1,101):
    with open(f'{i:03}.txt', 'w') as out:
        out.write('Hi')
