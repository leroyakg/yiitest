function sortStringAsc(a, b) {
	return a.localeCompare(b);
}

function sortStringDesc(a, b) {
	return b.localeCompare(a);
}

function sortIntAsc(a, b) {
	return a - b;
}

function sortIntDesc(a, b) {
	return b - a;
}