package arrays;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.Collections;

public class Student {

	private ArrayList<Integer> marks = new ArrayList<Integer>();
	private String name;

	public Student(String name, int... array) {
		this.name = name;

		for (int i : array) {
			this.marks.add(i);
		}
	}

	public int getNumberOfMarks() {
		return marks.size();
	}

	public int getTotalSumOfMarks() {
		int sum = 0;
		for (int i : marks) {
			sum += i;
		}
		return sum;
	}

	public int getMaximumMark() {
		return Collections.max(marks);

	}

	public int getMinimumMark() {
		return Collections.min(marks);
	}

	public BigDecimal getAverageMarks() {
		int sum = getTotalSumOfMarks();
		int num = getNumberOfMarks();
		return new BigDecimal(sum).divide(new BigDecimal(num));
	}

	@Override
	public String toString() {
		return name + marks;
	}

	public void addNewMark(int i) {
		marks.add(i);

	}

	public void removeMarkAtIndex(int index) {
		marks.remove(index);

	}
}
