import React from "react";

import { NavigationContainer } from "@react-navigation/native";
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';

import Aggiungi from "./screens/Aggiungi"
import Home from "./screens/Home"
import Profilo from "./screens/Profilo"
import Ricerca from "./screens/Ricerca"
import Accedi from "./screens/Accedi"

const Tab = createBottomTabNavigator();

export default function Navigation(){
    return(
        <NavigationContainer>
            <Tab.Navigator>
                <Tab.Screen name="Home" component={Home}/>
                <Tab.Screen name="Ricerca" component={Ricerca}/>
                <Tab.Screen name="Aggiungi" component={Aggiungi}/>
                <Tab.Screen name="Profilo" component={Profilo}/>
                <Tab.Screen name="Accedi" component={Accedi}/>

            </Tab.Navigator>
        </NavigationContainer>
    )
}