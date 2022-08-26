"""
Below code is automatically generated by code-davinci-002 on GTP3 Codex

1. check balance with blockchain
2. If blockchain is unreachable throw an error
"""

import requests
import json

def get_balance(address):
    url = "https://blockchain.info/q/addressbalance/" + address
    response = requests.get(url)
    if response.status_code == 200:
        return response.text
    else:
        raise BlockchainNotReachableError("Error reaching blockchain")