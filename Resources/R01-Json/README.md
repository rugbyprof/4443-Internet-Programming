## JSON - Intro to JSON
#### Due: NA

`JSON` (JavaScript Object Notation) is probably the most widely used data format to exchange data between programs. This data interchange can happen between two computers geographically distant or running on the same machine. 

The good thing is that JSON is a human and machine readable format. So while applications/libraries can parse the JSON data – humans can also look at data and derive meaning from it.

A JSON document expects a certiain format and assigns meaning to curly braces:`{}`, square brackets:`[]`, and colons. Curly braces create an "object", square brackets create a "list" and colons assigns values to key words (key value pairs). So, the item on the left of a colon is the "label" you would use to access a value in a specific object (just like an associative array).

A simple example looks like:

```json
// example key value pair
{
    "name":"Tony Stark",
    "age": 42,
    "occupation":"Iron Man"
}
```

You can then use this just as it were a variable:

```javascript
// example use as a variable
var person = {
    "name":"Tony Stark",
    "age": 42,
    "occupation":"Iron Man"
}

console.write(person.name);
// Tony Stark
```

You can use any variation of `{}` and `[]` to build complex structures:

```javascript
//Example embedded object
// 'address' is its own obect
var person = {
    "name": "Tony Stark",
    "age": 42,
    "occupation": "Iron Man",
	"address": {
		"street": "10880 Malibu Point",
		"city": "Malibu",
		"zip": 90265
	}
}
console.write(person.address.zip)
// 90265
```

How can we package multiple people in the same container?
```json
[
    {
        "name": "Tony Stark",
        "age": 42,
        "occupation": "Iron Man",
        "address": {
            "street": "10880 Malibu Point",
            "city": "Malibu",
            "zip": 90265
        }
    },
    {
        
        "name": "Steve Rogers",
        "age": 20,
        "occupation": "Captain America",
        "address": {
            "street": "569 Leaman Place",
            "city": "Brooklyn Heights",
            "zip": 11201
        }
    }
]
```

There is virtually no limits to the complexity of the data you can store, the only limit is your ability to traverse / retreive the data.

 
### References <a name="references" id="references"></a> 

1. http://www.json.org
2. https://restfulapi.net/introduction-to-json/