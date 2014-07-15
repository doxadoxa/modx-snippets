modx-snippets
=============

Snippets for MODx Evo

## List
List snippet use to render HTML-lists elements

### Use
`[[List? &tv=\`[*some_list_param*]\`]]`

### Params
#### &tv
List text. Call tv to simple understanding.

#### &outerTpl
Outer tpl for render code. Default: `<ul>[+list+]</ul>`. Use [+list+] placeholder to detect list position in outer.

#### &rowTpl
Chunk for list element. Support prefix @CODE: to use code in params. Default `@CODE:<li>[+text+]</li>`. Use [+text+] variable, when depth of row is 1. When depth is 2, use number placeholders [+0+],[+1+],..,[+n+], where n - count of list variable.

#### &depth
Default 1. Use 2 for more than 1 variable in list element.

### Examples

===
