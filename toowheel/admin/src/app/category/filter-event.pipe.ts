import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterEventCategory'
})
export class filterEventCategory implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.name.toLowerCase().indexOf(value.toLowerCase()) !== -1);
      }
    } else {
      return []
    }
  }
}