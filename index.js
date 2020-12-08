let obj = {
    ["a"]: {name: "a"},
    ["b"]: {name: "b"},
    ["c"]: {name: "c"}
},
newObj = [];

newObj.push(obj);

newObj.forEach(item => {
    newObj.push({
        "b": item.b,
        "a": item.a
    });
});

console.log(newObj);