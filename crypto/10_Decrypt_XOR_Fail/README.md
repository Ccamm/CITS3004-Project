# Decrypt XOR Fail

**Description:** Can you decrypt the following message that was encrypted using the XOR operation with a key of 1 byte long?

```
Kj0vEh5aCCI2EVkbNgJaMDYaWDMMNgwnWhsuEEhYWEhIFA==
```

**Provided Files:** [msg.txt](provided_files/msg.txt)

**Flag:** CTF{w3aK_x0r_k3Y_s1Ze_eN3rGy!11!!}

## Solution

* The encrypted message is base64 encoded, so need to decode it first.

* Using CyberChef, we can use the XOR Brute Force tool to decrypt the message and get the flag

* [https://gchq.github.io/CyberChef/#recipe=From_Base64('A-Za-z0-9%2B/%3D',true)XOR_Brute_Force(1,100,0,'Standard',false,true,false,'')&input=S2owdkVoNWFDQ0kyRVZrYk5nSmFNRFlhV0RNTU5nd25XaHN1RUVoWVdFaElGQT09](https://gchq.github.io/CyberChef/#recipe=From_Base64('A-Za-z0-9%2B/%3D',true)XOR_Brute_Force(1,100,0,'Standard',false,true,false,'')&input=S2owdkVoNWFDQ0kyRVZrYk5nSmFNRFlhV0RNTU5nd25XaHN1RUVoWVdFaElGQT09)
