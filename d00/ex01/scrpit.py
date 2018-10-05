import json

# file = open("elements.json", "r")
# elem_file = file.read()
# file.close
# el = json.loads(elem_file)

with open("elements.json") as f:
	el = json.load(f)
print(el['elements'][0]['name'])