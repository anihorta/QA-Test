import csv
# ТЕСТОВЫЙ КОММЕНТ

# открываем нужные файлы, указываем кодировку
file_ans = open('C:\\Users\\Кирилл\\Downloads\\Telegram Desktop\\strani.csv', encoding='utf8', newline='')
ans = []

# type_group = ''

# для каждой строки в файле
for line in file_ans:

    # удаляем символ переноса строки
    line = line.replace('\n', '')

    if line in ('1', '2', '3'):
        type_group = line
        continue

    # указываем разделитель для парсинга (тут пробел, обычно это ";")
    line = (line.split(';'))

    # работаем со строкой файла как с массивом
    line[0] = line[0].replace('.', '')
    line.append(type_group)

    # собираем финальный двумерный массив
    ans.append(line)

print(ans)

# ans_1 = []
# for s in ans:
#     part = []
#     part.append(s[0])
#
#     name = s[1]
#     for p in s[2:-4]:
#         name += (' ' + p)
#     part.append(name)
#
#     for i in [-4, -3, -2, -1]:
#         part.append(s[i].replace(',', '.'))
#
#     ans_1.append(part)
#
# print(ans_1)
#
# # записываем результаты в файл
# csv.register_dialect('myDialect', delimiter=';')
# with file_ans:
#     writer = csv.writer(file_ans, dialect='myDialect')
#     writer.writerows([['id', 'name', 'tax2016', 'tax2017', 'tax2018', 'pollutant_types_group_id']])
#     writer.writerows(ans_1)
