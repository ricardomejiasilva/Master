package com.in28minutes.oops;

public class Book {
	int noOfCopies;

	Book(int books) {
		this.noOfCopies = books;
	}
	public void setNoOfCopies(int noOfCopies) {
		if (noOfCopies > 0) {
			this.noOfCopies = noOfCopies;
		}
	}

	public void increaseCopies(int howMany) {
		setNoOfCopies(this.noOfCopies += howMany);
	}

	public void decreaseCopies(int howMany) {
		setNoOfCopies(this.noOfCopies -= howMany);
	}

	public int getCopies() {
		return noOfCopies;
	}

}
