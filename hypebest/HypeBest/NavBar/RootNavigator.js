import React from "react";
import { NavigationContainer } from '@react-navigation/native';

import { createStackNavigator } from '@react-navigation/stack';
import Navigation from "./Navigation"
import Profile from "../screens/Profilo"
import Accedi from '../screens/Accedi';
import Registrazione from '../screens/Registrazione';
import Camera from '../components/Camera';
import ImagePickerHype from '../components/ImagePickerHype';

const Stack = createStackNavigator();


export default function RootNavigator() {
  return (
    <NavigationContainer>
      <Stack.Navigator >
        <Stack.Screen name="Accedi" component={Accedi} />
        <Stack.Screen name="Registrazione" component={Registrazione} />
        <Stack.Screen name="Navigation" component={Navigation} options={{ headerShown: false }} />
        {/* <Stack.Screen name="NotFound" component={NotFoundScreen} options={{ title: 'Oops!' }} /> */}
        {/* <Stack.Group screenOptions={{ presentation: 'card' }}> */}
        <Stack.Screen name="Profile" component={Profile} />
        <Stack.Screen name="Camera" component={Camera} />
        <Stack.Screen name="ImagePickerHype" component={ImagePickerHype} />
        {/* </Stack.Group> */}
      </Stack.Navigator>
    </NavigationContainer>
  );
}