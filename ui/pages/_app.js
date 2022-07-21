import React from "react";
import { Layout } from "./Layout/Layout";
import { store } from '../redux/store'
import { Provider } from 'react-redux'
import "../styles/globals.css";

function MyApp({ Component, pageProps }) {
  return (
    <Layout>
      <Provider store={store}>
        <Component {...pageProps} />
      </Provider>
    </Layout>
  );
}

export default MyApp;
