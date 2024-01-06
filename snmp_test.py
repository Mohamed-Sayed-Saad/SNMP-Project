from easysnmp import snmp_get, snmp_set, snmp_walk
import json

# Specify the path to your JSON file
json_file_path = 'data.json'

# Read the JSON file
with open(json_file_path, 'r') as json_file:
    data = json.load(json_file)

# Storing values to variables
inp = data["oid"]
addr = data["address"]
comm = data["community"]

# Perform an SNMP SET to update data
#snmp_set(
#    'SNMPv2-MIB::sysLocation.0', 'left network',
#   hostname=addr, community=comm, version=2
#)

# Grab a single piece of information using an SNMP GET
descr = snmp_get(f'SNMPv2-MIB::{inp}.0', hostname=addr, community=comm, version=2)
print(descr)

# Perform an SNMP walk
# walk = snmp_walk('system', hostname=addr, community=comm, version=2)
# print(walk)
