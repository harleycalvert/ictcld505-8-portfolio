import urllib.request
from urllib.error import HTTPError

for _ in range(1000):
    for i in range(1,101):
        try:
            url = f'https://objectstorage.ap-melbourne-1.oraclecloud.com/n/axsfrj112dr6/b/web-bucket/o/{i:03}.txt'
            filename = f'{i:03}.txt'
            urllib.request.urlretrieve(url, filename)
            print(filename, ': Found')
        except HTTPError:
            print(filename, ': Not Found')
