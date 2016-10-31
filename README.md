# circularArray
Simple PHP class to convert conventional arrays into circular arrays.

Sometimes we need to use arrays in a non-conventional way, in a circular manner where the array wraps around itself. Although it is not particularly difficult to implement it in your own code, it may be even simpler to use something that is already done, functional and tested.

<h2>Indexed and associative arrays</h2>
You can use both indexed and associative arrays. When you use associative arrays, this class WILL NOT make any kind of sorting.

<h2>Methods</h2>
There are probably enough methods to meet your needs. You can create the circular array, get the value of the current position, get the index of the current position, advance, rewind and reset the pointer.
There are also some methods that wrap two methods in one call, like "advance and give me the new value". 

<h2>Easy to use</h2>
Example file is provided. The basic usage is:
```
$arrExample = [1,2,3,4];
$arrCircular = new circularArray($arrExample);

for ($i=0; $i<10; $i++) {
	echo $arrCircular->getCurrentValue();
	$arrCircular->next();
}
```

The expected output is "1234123412" (walk 10 times through the "1,2,3,4" array).
