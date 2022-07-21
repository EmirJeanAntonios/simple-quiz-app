import { createSlice } from "@reduxjs/toolkit";

export const answerSlice = createSlice({
  name: "answers",
  initialState: {},
  reducers: {
    addAnswer: (state, action) => {
      return { ...state, ...action.payload.answer };
    },
  },
});

// Action creators are generated for each case reducer function
export const { addAnswer } = answerSlice.actions;

export default answerSlice.reducer;
