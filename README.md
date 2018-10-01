# SimplexSolver

## Basic

In mathematical optimization, Dantzig's simplex algorithm (or simplex method) is a popular algorithm for linear programming.

The name of the algorithm is derived from the concept of a simplex and was suggested by T. S. Motzkin. Simplices are not actually used in the method, 
but one interpretation of it is that it operates on simplicial cones, and these become proper simplices with an additional constraint. 
The simplicial cones in question are the corners (i.e., the neighborhoods of the vertices) of a geometric object called a polytope. 
The shape of this polytope is defined by the constraints applied to the objective function.

_**Disclaimer: This SimplexSolver was created for educational purposes only. Its author is not responsible for any inaccuracies or errors in the results.**_

## Installation

**All the `dependencies` and `libraries` are included in the package. You do not need to install anything.**

_You will just need a browser to run the solver._

### Steps

1. `Download` or `Clone` the complete directory to your machine.
2. Run `Index.html`
3. Or you can directly visit [Simplex Solver](http://kuldeepsinghsidhu.com/SimplexSolver)
`kuldeepsinghsidhu.com/SimplexSolver`

![Landing Page](https://github.com/singhsidhukuldeep/SimplexSolver/raw/master/SimplexSolver/landing_page.png)

## Usage

Use of this system is pretty intuitive: Press "`Example`" to see an example of a linear programming problem already set up. 
Then modify the example or enter your own linear programming problem in the space below using the same format as the example, and press "`Solve`"

**Note:**
- Do not use commas in large numbers. For instance, enter `100,000` as `100000`.
- The right-hand side of each constraint must be non-negative, so multiply through by `−1` first if necessary.
- The utility is quite flexible with input. For instance, the following format will also be accepted (inequalities separated by commas):
`Maximize p = x+y subject to x+y <= 2, 3x+y >= 4`
- Decimal mode displays all the tableaus (and results) as decimals, rounded to the number of significant digits you select (up to 13, depending on your processor and browser).
- Fraction mode converts all decimals to fractions and displays all the tableaus (and solutions) as fractions.
- Integer Mode eliminates decimals and fractions in all the tableaus (using the method described in the simplex method tutorial) and displays the solution as fractions.
- Mac users: you can use the inequality symbols "`option+<`" and "`option+>`" instead of "`<=`" and "`>=`" if you like _(although some browsers may have difficulties with this)_.
- **Important:** Every variable you use must appear in the objective function (but not necessarily in the constraints). For example, `Maximize p = 0x + 2y + 0z`
- **Solution Display:** Some browsers (including some versions of Internet Explorer) use a proportional width font (like Geneva or Times) in text boxes. This will cause the display of solutions to appear a little messy. You can remedy this by changing the "Sans Serif" font in your browser preferences to "Courier" or some other fixed-width font, and then reloading the page.

## Implementation

- `index.html`: Contains the front-end for the website depenencies of which
are located in `assets` which uses _bootstrap_
- `AboutSimplex.html`: Contains a few more information about Simplex Algorithm.
- `SimplexAlgorithm.pdf`: Is the Article on Simplex Algorithm.
- `assets/js/Solver/simplex.js`: Contains all the functions as _JavaScript_ that Solve the Linear Optimization Problems.

### `assets/js/Solver/simplex.js` 

_**This is the complete SOLVER**_

**functions in `assets/js/Solver/simplex.js`:**
- `function sesame(url,hsize,vsize)`:
Form utilities to print in the form
- `function doIt()`:
Checks which button is pressed and calls the functions accordingly.
- `function simplexMethod(InMatrix, rows, cols)`:
Simplex starts here.
- `function pivot(InMatrix,rows,cols,theRow,theCol)`:
Makes the point in the `InMatrix` as pivot.
- `function parser (InString, Sep)`:
returns an array 0th entry = number n of blocks (-1) if the character Sep does not occur
subsequent n entries are the blocks themselves
Here are the blocks
***block 1 *** SEP *** block 2 *** SEP *** block 3 ***
(one more block than number of occurrences of SEP)
- `function parseLinearExpr(InString)`:
Returns an array: with 0th entry = an array of variable names 
(eg. `["x", "x'", "y", "z"]`)
and subsequent entries the coefficients.
to get the number of coefficients, just take the length of the array in position 0.
first remove a leading cr if 
- `function SetupTableau()`:
reads problem and sets up the first tableau
- `function rightString (InString, num)`:
Returns a sub string from position `num` till the end of `InString`
- `function rightTrim (InString)`:
Removes last character in the `InString`
- `function replaceChar (InString,oldSymbol,newSymbol)`:
In `InString` searches for `oldSymbol` and replaces it with `newSymbol`
- `function replaceSubstring (InString,oldSubstring,newSubstring)`:
In `InString` searches for `oldSubstring` and replaces it with `newSubstring`
- `function makeInteger(theMatrix, RowNum, ColNum,Strings)`:
Makes a matrix integer by least common multiples of rows
returms a matrix of STRINGS `if Strings = true` `else gives integers
input = a matrix of real floats`
also records the row lcm of row i in outArray[i][0]
- `function toFrac(x, maxDenom, tol)`:
tolerance is the largest errror you will tolerate before resorting to 
expressing the result as the input decimal in fraction form
suggest no less than 10^-10, since we round all to 15 decimal places.
- `function toFracArr(x, maxDenom, tol)`:
identical to `toFrac`, except this returns an `array [1] = numerator`;  `[2] = denom` rather than a string.
- `function isCharHere (InString, RefString)`:
Checks whether its a character or a string (Single digit or a larger number)
- `function checkString(InString,subString,backtrack)`:
check for subString
`if backtrack = false`, `returns -1` if not found, and left-most location in string if found
`if backtrack = true`, `returns -1` if not found, and right-most location in string if found
note that location is to the left of the substring in both cases
- `function looksLikeANumber(theString)`:
Returns true if theString looks like it can be evaluated i.e. if it is a string with just numeric characters.
- `function roundSix(theNumber)`:
Rounds to six digits.
- `function roundSigDig(theNumber, numDigits)`:
Rounds `theNumber` till `numDigits`
- `function shiftRight(theNumber, k)`:
Shifts decimal k places to the right.
- `function reduce(fraction)`:
Reduces a fraction using `function hcf (a,b)`
-  `function hcf (a,b)`:
Takes `input` as two numbers and converts them into possitive and calculates HCF (Highest Common Factor)
- `function lcm(a,b)`:
Takes `input` as two numbers and converts them into possitive and calculates LCM (Lowest Common Multiplier)
- `function lastChar(theString)`:
Returns the last Character in the string.
- `function displayMatrix(number)`:
Displays Tableau
- `function makeArray3 (X,Y,Z)`:
Makes 3 Dimensional Tableau
- `function makeArray2 (X,Y)`:
Makes 2 Dimensional Tableau
- `function makeArray (Y)`:
Makes 1 Dimensional Tableau
- `function stripSpaces (InString)`:
Removes Spaces in `InString`
- `function stripChar (InString,symbol)`:
Removes `symbol` from `InString` if present
- `function myErrorTrap(message,url,linenumber)`: 
This gives error alert in case the program crashes.
- `function displayFinalStatus()`:
Gives the solution or the error messages.

## CREDITS

>Kuldeep Singh Sidhu

Github: [github/singhsidhukuldeep](https://github.com/singhsidhukuldeep)
`https://github.com/singhsidhukuldeep`

Website: [Kuldeep Singh Sidhu (Website)](http://kuldeepsinghsidhu.com)
`http://kuldeepsinghsidhu.com`

LinkedIn: [Kuldeep Singh Sidhu (LinkedIn)](https://www.linkedin.com/in/singhsidhukuldeep/)
`https://www.linkedin.com/in/singhsidhukuldeep/`

