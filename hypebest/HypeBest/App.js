import React from "react";
import RootNavigator from "./NavBar/RootNavigator";
import { NativeBaseProvider } from 'native-base';
export default function App() {
  return (
    <NativeBaseProvider>
      <RootNavigator />
    </NativeBaseProvider>
  );
}

