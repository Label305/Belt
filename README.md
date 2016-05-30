Belt
====

Helping us to generate exports and process import in a memory efficient way.

Usage
-----

TL;DR write a data `Provider`, transform it with a `Transformer` so that
your `Assembler` can write to your persistence.

Exporting/importing is nothing more than transformation from one datasource
and writing to another. So there are a few main parts that come into play
`Provider`, `Transformer`, `Assembler` and `Persister`. 

The `Provider`, this will take care of feeding the system with data. Using
a generator function a file, stream, database can be read and provided in the
form of `DataBags`, a `DataBag` is a simple key/value store with which the
system knows how to cope.

Now each `DataBag` is passed through a `Transformer` which will create
an (associative) array. This `Transformer` will "decide" how the output
will look and decides about order of fields, available fields etc.

After transformation an `Assembler` will take over, this is the step
that will actually create some output. This can be a line of a CSV, but,
since it knows its limitations, also a combined associative array that
after everything is done will compile to a JSON blob.

This `Assembler` step will also manage what is passed to a `Persister`. 
Which can be your own repository or one borrowed from us, such as the
`FilePersister`, which will, in the case of CSV's, neatly write every line
one after another.


License
---------
Copyright 2016 Label305 B.V.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

[http://www.apache.org/licenses/LICENSE-2.0](http://www.apache.org/licenses/LICENSE-2.0)

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
