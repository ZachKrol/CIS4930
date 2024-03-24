// Statistics library

function findN(array) {
  let quantity = parseFloat(0);

  for (var i = 0; i < array.length; i++) {
    quantity++;
  }

  return parseFloat(quantity);
}

function findSum(array) {
  let sum = parseFloat(0);

  for (var i = 0; i < array.length; i++) {
    sum = sum + parseFloat(array[i]);
  }

  sum = Math.round((sum + Number.EPSILON) * 100) / 100;

  return parseFloat(sum);
}

function findMean(array) {
  let mean = parseFloat(findSum(array) / findN(array));
  mean = Math.round((mean + Number.EPSILON) * 100) / 100;

  return mean;
}

function findMedian(array) {
  let median = parseFloat(0);
  for (var i = 0; i < array.length; i++) {
    array[i] = parseFloat(array[i]);
  }

  let sorted = Array.from(array).sort((a, b) => a - b);
  let middle = Math.floor(sorted.length / 2);

  if (sorted.length % 2 === 0) {
    median = (sorted[middle - 1] + sorted[middle]) / 2;
    median = Math.round((median + Number.EPSILON) * 100) / 100;
    return median;
  }

  median = sorted[middle];
  median = Math.round((median + Number.EPSILON) * 100) / 100;
  return median;
}

function findMode(array) {
  const mode = {};
  let max = 0,
    count = 0;

  for (let i = 0; i < array.length; i++) {
    const item = array[i];

    if (mode[item]) {
      mode[item]++;
    } else {
      mode[item] = 1;
    }

    if (count < mode[item]) {
      max = item;
      count = mode[item];
    }
  }

  return max;
}

function findMax(array) {
  let max = parseFloat(array[0]);
  for (var i = 0; i < array.length; i++) {
    if (parseFloat(array[i]) > max) {
      max = array[i];
    }
  }

  max = parseFloat(Math.round((max + Number.EPSILON) * 100) / 100);
  return max;
}

function findMin(array) {
  let min = parseFloat(array[0]);
  for (var i = 0; i < array.length; i++) {
    if (parseFloat(array[i]) < min) {
      min = array[i];
    }
  }

  min = parseFloat(Math.round((min + Number.EPSILON) * 100) / 100);
  return min;
}

function findRange(array) {
  let range = parseFloat(0);
  range = parseFloat(findMax(array) - findMin(array));

  range = parseFloat(Math.round((range + Number.EPSILON) * 100) / 100);
  return range;
}

function findVariance(array) {
  let variance = parseFloat(0);
  let mean = parseFloat(findMean(array));
  let intermediateSum = parseFloat(0);

  for (var i = 0; i < array.length; i++) {
    let num = parseFloat(array[i]) - mean;
    num = num * num;
    intermediateSum = parseFloat(intermediateSum + num);
  }
  variance = parseFloat(intermediateSum / (findN(array) - 1.0));

  variance = parseFloat(Math.round((variance + Number.EPSILON) * 100) / 100);
  return variance;
}

function findStandardDeviation(array) {
  let stdDev = parseFloat(0);
  stdDev = Math.sqrt(parseFloat(findVariance(array)));

  stdDev = parseFloat(Math.round((stdDev + Number.EPSILON) * 100) / 100);
  return stdDev;
}
