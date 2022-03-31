import React from "react";
import { NavigationContainer } from '@react-navigation/native';

import { createStackNavigator } from '@react-navigation/stack';
import Navigation from "./Navigation"
import Profile from "../screens/Profilo"

const Stack = createStackNavigator();


export default function RootNavigator() {
  return (
    <NavigationContainer>
    <Stack.Navigator>
      <Stack.Screen name="Navigation" component={Navigation} options={{ headerShown: false }} />
      {/* <Stack.Screen name="NotFound" component={NotFoundScreen} options={{ title: 'Oops!' }} /> */}
      <Stack.Group screenOptions={{ presentation: 'card' }}>
        <Stack.Screen name="Profile" component={Profile} />
      </Stack.Group>
    </Stack.Navigator>
    </NavigationContainer>
  );
}